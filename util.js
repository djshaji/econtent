/*
function ui (element) {
  return document.getElementById (element)
}

function uic (element) {
  return document.createElement (element)
}
*/
var ui = document.getElementById.bind(document);
var uic = document.createElement.bind(document);

function logout () {
    firebase.auth().signOut().then(function() {
      // Sign-out successful.
      alert ("You have been logged out.")
      // if (module != 'daybook')
      setCookie ("token", null, 10, 'auth')

      location.href = "/"
      // else
      //     location.reload ()
    }).catch(function(error) {
      // An error happened.
      alert ("Unable to log out")
      console.error (error)
    });
}

var fireuser = null ;
var token = null ;
function init () {
  console.log ("init", location.href)
  for (topic of ["edit", "topic", "file", "convener"])
    $('#' + topic).on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var semester = button.data('semester') // Extract info from data-* attributes
      var university = button.data('university') // Extract info from data-* attributes
      var course = button.data('course') // Extract info from data-* attributes
      var unit = button.data('unit') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('#semester').val(semester)
      modal.find('#university').val(university)
      modal.find('#course').val(course)
      modal.find('#unit').val(unit)
      modal.find ("#warning").show ()
      modal.find ("#faculty").html ("")

      // are we editing a topic?
      // edit = button.parent ().attr ("data-faculty")
      // console.log (button.parent ().attr ("data-faculty"))
      // if (edit != null) {
      for (a of ['faculty', 'designation', 'phone', 'email','title']) {
          modal.find ("[name='" + a + "']").val (button.parent ().attr ('data-'+a))
          // console.log (button.parent ().attr ('data-'+a))
      }

      try {
        a = button.parent ().parent ().parent ().find ("label")     
        for (b of a) {
          o = document.createElement ("option")
          o.innerText = b.innerText
          o.value = b.innerText
          modal.find ("#faculty").append (o)
          modal.find ("#warning").hide ()
        }
      }catch (err) {
        console.error (err)
      }
    })
  
//   firebase_init ()
  firebase.auth().onAuthStateChanged(async function(user) {
    if (user) {
      fireuser = user
      console.log (user)
      // User is signed in.
      try {
        document.getElementById ("menu-login").classList.add ('d-none')
        document.getElementById ("menu-upload").classList.remove ('d-none')
        document.getElementById ("menu-logout").classList.remove ('d-none')
        document.getElementById ("email").innerText = fireuser.email //.split ("@")[0]

        btn = document.getElementById ("upload-btn")
        if (btn != null) {
          btn.href = '/upload.php'
        }
  
        if (append_uid) {
          var searchParams = new URLSearchParams(location.href);
          if (!searchParams.has ("uid")) {
              searchParams.append ("uid", fireuser.uid)
              location.href = location.href + '?' + searchParams.toString ();
          }
            
        }
      } catch (err) {
          console.log (err)
      }

      await firebase.auth().currentUser.getIdTokenResult()
      .then((idTokenResult) => {
        console.log (idTokenResult)
        token = idTokenResult
        // document.getElementById ("token").value = token.token;
        setCookie ("token", token.token, 10, 'auth')
        // document.cookie ['token'] = token.token
        // document.cookie ['uid'] = user.uid
      })
            
    } else {
      // No user is signed in.
      console.warn ("No user signed in")
      setCookie ("token", null, 10, 'auth')


    }
  });
  
}

function setCookie(cname, cvalue, exdays, path="/") {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=" + path;
}

function add_files (element = "photo-files", colname = 'photos') {
  e = document.getElementById (element).querySelectorAll ("input").length + 1

  input = document.createElement ('div')
  for (c of "col-5 m-2 form-group btn btn-sm btn-success text-white".split (" "))
    input.classList.add (c)
  input.innerHTML = 
    '<label class="text-white" for="photos-' + e + '">Choose file</label>\
    <input type="file" class="form-control-file" id="' + colname + '-' + e + ' name="photos-' + e + '>' ;

  document.getElementById (element).appendChild (input)
}

function delete_convener (button) {
    swal({
        title: "Delete convener?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            data = button.parentElement.parentElement.dataset
            cmd = '/post.php?mode=delete&prop=convener&'
            // console.log (data)
            for (a of ['university', 'semester', 'course']) {
                cmd = cmd + '&' + a + '=' + data [a]
            }

            location.href = cmd 
        } 
      });
      
}

function hotkeys (event) {
  var x = event.keyCode;
  switch (x) {
    case 190:
        if (event.ctrlKey) {
          $("#topic").modal ("show");
          return false ;
        }
    default:
        // console.log (x)
        return true ;
  }

}

function delete_file (button, unit, filetype, file) {
  data = button.parentElement.parentElement.parentElement.parentElement.parentElement.dataset
  // console.log (data)
  swal({
      title: "Delete file?",
      text: "Once deleted, you will not be able to recover this data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          cmd = '/post.php?mode=delete&prop=file&unit=' + unit + '&filetype=' + filetype + '&file=' + file
          // console.log (data)
          for (a of ['university', 'semester', 'course']) {
              cmd = cmd + '&' + a + '=' + data [a]
          }

          location.href = cmd 
      } 
    });
    
}


function delete_unit (button, unit, topic) {
  data = button.parentElement.parentElement.parentElement.dataset
  cmd = '/post.php?mode=delete&prop=unit&unit=' + unit + '&topic=' + topic
  console.log (cmd)
  swal({
      title: "Delete Topic?",
      text: "Once deleted, you will not be able to recover this data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          for (a of ['university', 'semester', 'course']) {
              cmd = cmd + '&' + a + '=' + data [a]
          }

          location.href = cmd 
      } 
    });
    
}

function upload_open (all) {
  if (all) {
    location.href = '/upload.php'
    return ;
  }
  
  cmd = '/upload.php?' 
  for (a of ['university', 'semester', 'course']) 
    cmd = cmd + '&' + a + '=' + ui (a).value
  
  location.href = cmd

  
}
