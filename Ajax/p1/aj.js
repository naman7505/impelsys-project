

$(document).ready(function(){

    $("#deptname").change(function()
    {
    var dept=$('#deptname').val();
   // var catg=$('#deptname1').val();
    console.log(dept);
    $.ajax({
        url: 'repository.php',
        type: 'POST',
        dataType: 'JSON',
        data:{deptname:dept},
        cache:false,
        success: function(response)
            {
            var len = response.length;
           // console.log(len);
           $("#userTable tr").remove();
            for(var i=0; i<len; i++)
                {
                var id = response[i].id;
                var username = response[i].username;
                var name = response[i].name;
                var email = response[i].email;
                var tr_str = "<tr>" +
                    "<td align='center'>" + (i+1) + "</td>" +
                    "<td align='center'>" + username + "</td>" +
                    "<td align='center'>" + name + "</td>" +
                    "<td align='center'>" + email + "</td>" +
                     "<select >hello</select>"+ 
                    "</tr>";
                $("#userTable").append(tr_str);
                }
            }
        });
    });
});