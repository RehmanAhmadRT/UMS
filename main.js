var student =new app.Student();
var studentView=new app.StudentView({model: student});
var studentCollection=new app.StudentList();
var collectionView=new app.CollectionView({collection: studentCollection});

$('#buttonShow').click( function() {
  console.log("Message is here");
  student.fetch({
     /*success: function (students, response) {
       console.log("Success");
         students.each(function (item, index, all) {
             item.set("name", item.get("name"));
         }); */
 success: function (studentResponse) {
    console.log("Found the student " + studentResponse.get("sname"));
    student.set("sname",studentResponse.get("sname"));
    console.log(studentResponse);
    this.studentView.render();
  },
     error: function (collection, response, options) {
       console.log("Something went wrong while fetching the model");
     },
   complete: function(xhr, textStatus) {
     console.log(textStatus);
   }
   });
 });

$('#buttonInsert').click(function(){
  //console.log("hell ");


  console.log("hello " + $('#sname').val());

    student.set("sname",$('#sname').val());
    student.set("fk_tid",$('#fk_tid').val());
    student.set("fk_cid",$('#fk_cid').val());
    //console.log(student.get("sname"));
     student.save({}, {
      success: function (model, response, options) {
          console.log("The model has been saved to the server");
          console.log(response);
          studentCollection.add(student);
      },
      error: function (model, xhr, options) {
          console.log("Something went wrong while saving the model");
      }
    });
  });
