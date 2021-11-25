

$(document).ready(function(){

    $("#prodcat").change(function()
    {
        //console.log("hello");
    var catg=$('#prodcat').val();
    // var catg=$str;
    console.log(catg);
   // var catg=$('#deptname1').val();
    // console.log(catg);
    $.ajax({
        url: 'repo2.php',
        type: 'POST',
        dataType: 'JSON',
        data:{prodcat:catg},
        cache:false,
        success: function(response)
            {
            var len = response.length;
           console.log(response[1].prod_id);
           $("#prodTable tr").remove();
            for(var i=0; i<len; i++)
                {
                var prod_id = response[i].prod_id;
                var prod_name = response[i].prod_name;
                //console.log(prod_name);
                var prod_desc = response[i].prod_desc;
                var prod_cost = response[i].prod_cost;
                //var prod_details="<input type='radio' name='more' id='more'>";
                
                
                var tr_str = "<tr>" +
                    "<td align='center'>" + (i+1) + "</td>" +
                    "<td align='center'>" + prod_name + "</td>" +
                    "<td align='center'>" + prod_desc + "</td>" +
                    "<td align='center'>" + prod_cost + "</td>" +
                    "<td><a id="+response[i].prod_desc+" class='more' name='more' href='#'>More...</a></td>" +
                  
                    "</tr>";
                $("#prodTable").append(tr_str);
                // $("#more").click(function(){
                //     ('p').show();
                // });
                
                }
                moreAnchorClick();
            }
        });
    });
});

    function moreAnchorClick()
    {
        $('a').click(function(){
            event.preventDefault();
            console.log("hello");
            alert('Description:'+event.target.id);
        });
    }

    // function moreshow(empno)
    // {


    // }