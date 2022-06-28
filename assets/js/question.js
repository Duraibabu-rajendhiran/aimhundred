
               document.getElementById("board").value = getSavedValue("board"); // set the value to this input
               document.getElementById("medium").value = getSavedValue("medium"); // set the value to this input
               document.getElementById("academic").value = getSavedValue("academic"); // set the value to this input
               function saveValue(e) {
                   var id = e.id; // get the sender's id to save it . 
                   var val = e.value; // get the value. 
                   localStorage.setItem(id,
                       val); // Every time user writing something, the localStorage's value will override . 
               }
               //get the saved value function - return the value of "v" from localStorage. 
               function getSavedValue(v) {
                   if (!localStorage.getItem(v)) {
                       return ""; // You can change this to your defualt value. 
                   }
                   return localStorage.getItem(v);
               }
               function showview(v1, v2, v3) {
                   console.log(v1, v2, v3);
                   const a = document.getElementById(v1).style.display;
                   const b = document.getElementById(v2).style.display;
                   const c = document.getElementById(v3).style.display;
                   console.log(a, b, c);
                   if (a == "block" && b == "none" && c == "none") {
                       document.getElementById(v1).style.display = "none";
                       document.getElementById(v2).style.display = "block";
                       document.getElementById(v3).style.display = "block";
                   } else {
                       document.getElementById(v1).style.display = "block";
                       document.getElementById(v2).style.display = "none";
                       document.getElementById(v3).style.display = "none";
                   }
               }
               function showviewup(v1, v2, v3) {
                   console.log(v1, v2, v3);
                   const a = document.getElementById(v1).style.display;
                   const b = document.getElementById(v2).style.display;
                   const c = document.getElementById(v3).style.display;
                   if (a == "block" && b == "none" && c == "none") {
                       document.getElementById(v1).style.display = "none";
                       document.getElementById(v2).style.display = "block";
                       document.getElementById(v3).style.display = "block";
                   } else {
                       document.getElementById(v1).style.display = "block";
                       document.getElementById(v2).style.display = "none";
                       document.getElementById(v3).style.display = "none";
                   }
               }
               function showDiv(select1) {
                   if (select1.value == "0") {
                       document.getElementById('question').style.display = "inline";
                       document.getElementById('image').style.display = "none";
                   } else if (select1.value == "1") {
                       document.getElementById('question').style.display = "none";
                       document.getElementById('image').style.display = "inline";
                   } else if (select1.value == "2") {
                       document.getElementById('question').style.display = "inline";
                       document.getElementById('image').style.display = "inline";
                   } else {
                       document.getElementById('question').style.display = "none";
                       document.getElementById('image').style.display = "none";
                   }
               }
               function showDiv(select1, val1, val2) {
                   if (select1.value == "0") {
                       document.getElementById(val1).style.display = "inline";
                       document.getElementById(val2).style.display = "none";
                   } else if (select1.value == "1") {
                       document.getElementById(val1).style.display = "none";
                       document.getElementById(val2).style.display = "inline";
                   } else {
                       document.getElementById(val1).style.display = "none";
                       document.getElementById(val2).style.display = "none";
                   }
               }
               $('#classd').change(function() {
                   var classID = $(this).val();
                   var boardID = $('#boardd').val();
                   var mediumID = $('#mediumd').val();
                   if (classID) {
                       $.ajax({
                           type: "GET",
                           url: "{{ url('classit') }}?class_id=" + classID + '&board_id=' + boardID +
                               '&medium_id=' + mediumID,
                           success: function(res) {
                               if (res) {
                                   $("#subjectd").empty();
                                   $("#subjectd").append('<option>Select subject</option>');
                                   $.each(res, function(key, value) {
                                       $("#subjectd").append('<option value="' + key +
                                           '">' + value +
                                           '</option>');
                                   });
                               } else {
                                   $("#subjectd").empty();
                               }
                           }
                       });
                   } else {
                       $("#subjectd").empty();
                       $("#per").empty();
                   }
               });
               $('#subjectd').on('change', function() {
                   var subjectID = $(this).val();
                   if (subjectID) {
                       $.ajax({
                           type: "GET",
                           url: "{{ url('subjectit') }}?subject_id=" + subjectID,
                           success: function(res) {
                               if (res) {
                                   $("#lessond").empty();
                                   $("#lessond").append('<option>lesson</option>');
                                   $.each(res, function(key, value) {
                                       $("#lessond").append('<option value="' + key +
                                           '">' + value +
                                           '</option>');
                                   });
                               } else {
                                   $("#lessond").empty();
                               }
                           }
                       });
                   } else {
                       $("#lessond").empty();
                   }
               });
               $('#class').change(function() {
                   var classID = $(this).val();
                   var boardID = $('#board').val();
                   var mediumID = $('#medium').val();
                   if (classID) {
                       $.ajax({
                           type: "GET",
                           url: "{{ url('classit') }}?class_id=" + classID + '&board_id=' + boardID +
                               '&medium_id=' + mediumID,
                           success: function(res) {
                               if (res) {
                                   $("#subject").empty();
                                   $("#subject").append('<option>Select subject</option>');
                                   $.each(res, function(key, value) {
                                       $("#subject").append('<option value="' + key +
                                           '">' + value +
                                           '</option>');
                                   });
                               } else {
                                   $("#subject").empty();
                               }
                           }
                       });
                   } else {
                       $("#subject").empty();
                       $("#per").empty();
                   }
               });
               $('#subject').on('change', function() {
                   var subjectID = $(this).val();
                   if (subjectID) {
                       $.ajax({
                           type: "GET",
                           url: "{{ url('subjectit') }}?subject_id=" + subjectID,
                           success: function(res) {
                               if (res) {
                                   $("#lesson").empty();
                                   $("#lesson").append('<option>lesson</option>');
                                   $.each(res, function(key, value) {
                                       $("#lesson").append('<option value="' + key + '">' +
                                           value +
                                           '</option>');
                                   });
                               } else {
                                   $("#lesson").empty();
                               }
                           }
                       });
                   } else {
                       $("#lesson").empty();
                   }
               });
               $('#class2').change(function() {
                   var classID = $(this).val();
                   var boardID = $('#board2').val();
                   var mediumID = $('#medium2').val();
                   if (classID) {
                       $.ajax({
                           type: "GET",
                           url: "{{ url('classit') }}?class_id=" + classID + '&board_id=' + boardID +
                               '&medium_id=' + mediumID,
                           success: function(res) {
                               if (res) {
                                   $("#subject2").empty();
                                   $("#subject2").append('<option>Select subject</option>');
                                   $.each(res, function(key, value) {
                                       $("#subject2").append('<option value="' + key +
                                           '">' + value +
                                           '</option>');
                                   });
                               } else {
                                   $("#subject2").empty();
                               }
                           }
                       });
                   } else {
                       $("#subject2").empty();
                       $("#per").empty();
                   }
               });
               $('#subject2').on('change', function() {
                   var subjectID = $(this).val();
                   if (subjectID) {
                       $.ajax({
                           type: "GET",
                           url: "{{ url('subjectit') }}?subject_id=" + subjectID,
                           success: function(res) {
                               if (res) {
                                   $("#lesson2").empty();
                                   $("#lesson2").append('<option>Select lesson</option>');
                                   $.each(res, function(key, value) {
                                       $("#lesson2").append('<option value="' + key +
                                           '">' + value +
                                           '</option>');
                                   });
                               } else {
                                   $("#lesson2").empty();
                               }
                           }
                       });
                   } else {
                       $("#lesson2").empty();
                   }
               });
               $('#class1').change(function() {
                   var classID = $(this).val();
                   var boardID = $('#board1').val();
                   var mediumID = $('#medium1').val();
                   if (classID) {
                       $.ajax({
                           type: "GET",
                           url: "{{ url('classit') }}?class_id=" + classID + '&board_id=' + boardID +
                               '&medium_id=' + mediumID,
                           success: function(res) {
                               if (res) {
                                   $("#subject1").empty();
                                   $("#subject1").append('<option>Select subject</option>');
                                   $.each(res, function(key, value) {
                                       $("#subject1").append('<option value="' + key +
                                           '">' + value +
                                           '</option>');
                                   });
                               } else {
                                   $("#subject1").empty();
                               }
                           }
                       });
                   } else {
                       $("#subject1").empty();
                       $("#per").empty();
                   }
               });
               $('#subject1').on('change', function() {
                   var subjectID = $(this).val();
                   if (subjectID) {
                       $.ajax({
                           type: "GET",
                           url: "{{ url('subjectit') }}?subject_id=" + subjectID,
                           success: function(res) {
                               if (res) {
                                   $("#lesson1").empty();
                                   $("#lesson1").append('<option>Select lesson</option>');
                                   $.each(res, function(key, value) {
                                       $("#lesson1").append('<option value="' + key +
                                           '">' + value +
                                           '</option>');
                                   });
                               } else {
                                   $("#lesson1").empty();
                               }
                           }
                       });
                   } else {
                       $("#lesson1").empty();
                   }
               });
               $(document).on('click', '#smallButton', function(event) {
                   event.preventDefault();
                   let href = $(this).attr('data-attr');
                   $.ajax({
                       url: href,
                       beforeSend: function() {
                           $('#loader').show();
                       },
                       // return the result
                       success: function(result) {
                           $('#smallModal').modal("show");
                           $('#smallBody').html(result).show();
                       },
                       complete: function() {
                           $('#loader').hide();
                       },
                       error: function(jqXHR, testStatus, error) {
                           console.log(error);
                           alert("Page " + href + " cannot open. Error:" + error);
                           $('#loader').hide();
                       },
                       timeout: 8000
                   })
               });
               // display a modal (medium modal)
               $(document).on('click', '#mediumButton', function(event) {
                   event.preventDefault();
                   let href = $(this).attr('data-attr');
                   $.ajax({
                       url: href,
                       beforeSend: function() {
                           $('#loader').show();
                       },
                       // return the result
                       success: function(result) {
                           $('#mediumModal').modal("show");
                           $('#mediumBody').html(result).show();
                       },
                       complete: function() {
                           $('#loader').hide();
                       },
                       error: function(jqXHR, testStatus, error) {
                           console.log(error);
                           alert("Page " + href + " cannot open. Error:" + error);
                           $('#loader').hide();
                       },
                       timeout: 8000
                   })
               });
       