$(function(){
      // all global function are located to assets/js/script-me.js
      checkboxEditTable(URL+"subjects/edit/");
      $('#addForm').submit(function(){
            var r = confirm('Are you sure?');
            if(r ==  true){
                return;
            }
        })
        $('#editForm').submit(function(){
            var r = confirm('Are you sure?');
            if(r ==  true){
                return;
            }
        })
        $('#deleteForm').submit(function(){
            var r = confirm('Are you sure?');
            if(r ==  true){
                return;
            }
        })
})