<html>

<body>

   <form action="http://localhost:3000/post_paid.php" method="POST">
      trnnum: <input type="text" name="trnnum" value="9001234567" />
      cshpaid: <input type="text" name="cshpaid" valus="10000" />
      ccardamt: <input type="text" name="ccardamt" value="9200" />
      ccardno: <input type="text" name="ccardno" value="1234-1234-1234-1234" />
      ccardname: <input type="text" name="ccardname" value="KTC" />
      ccardexpire: <input type="text" name="ccardexpire" value="12/22" />
      pointamt: <input type="text" name="pointamt" />
      pointuse: <input type="text" name="pointuse" />

      gvamt: <input type="text" name="gvamt" />
      gvline_stkcod: <input type="text" name="gvline_stkcod" />
      gvline_stkdes: <input type="text" name="gvline_stkdes" />
      gvline_sellpr: <input type="text" name="gvline_sellpr" />
      <input type="submit" />
   </form>
   <div id="demo"></div>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script lang="en" type="text/javascript">
      $(document).ready(function() {
         Get_User_Info();
         //Post_Paid();
         console.log("<?php $_PHP_SELF ?>");
         console.log("-- HEAR --");
         //header('Access-Control-Allow-Origin: *');
         function Get_User_Info() {
            $.ajax({
               // headers: {
               //    "Access-Control-Allow-Origin": "*"
               // },
               type: "GET",
               url: "http://localhost:3000/getSTKDES.php",
               data: {
                  "stkcod": "10001"
               },
               contentType: 'application/json; charset=utf-8',
               dataType: "json",

               success: function(data) { //Return เป็น JSON Object (ไม่ใช่ JSON String,แปลงด้วย JSON.parse)
                  console.log("--SUCCESS--");
                  for (x in data) {
                     document.getElementById("demo").innerHTML += x + "=" + data[x];
                  }
                  //var JSONArray = JSON.parse(data);
                  //console.log(JSONArray);
               },
               error: function(response) {
                  console.log("--ERROR--");
                  var r = jQuery.parseJSON(response.responseText);
                  alert("Message: " + r.Message);
                  alert("StackTrace: " + r.StackTrace);
                  alert("ExceptionType: " + r.ExceptionType);
               }

            });
         }

         function Post_Paid() {
            var rec = {
               'state': true,
               'trnnum': '9001234567',
               'cshpaid': 19200.00,
               'ccardamt': 1500.25,
               'ccardno': '1234-1234-1234-1234',
               'ccardexpire': '12/22',
               'ccardname': 'KTC',
               'pointamt': 200,
               'pointuse': 20,
               'pointonhand': 2345,
               'gvamt': 450,
               'gvline': [],
            };
            rec.gvline.push({
               'stkcod': '50100',
               'stkdes': 'คูปองส่วนลด 100.-',
               'sellpr': 100
            });
            rec.gvline.push({
               'stkcod': '50100',
               'stkdes': 'คูปองส่วนลด 100.-',
               'sellpr': 100
            });
            rec.gvline.push({
               'stkcod': '50250',
               'stkdes': 'คูปองส่วนลด 250.-',
               'sellpr': 250
            });

            $.ajax({
               // headers: {
               //    "Access-Control-Allow-Origin": "*"
               // },
               type: "POST",
               url: "http://localhost:3000/post_paid.php",
               data: JSON.stringify(rec), //JSON.stringify(postData) //stringify is important
               contentType: 'application/json; charset=utf-8',
               dataType: "json",

               success: function(data) { //Return เป็น JSON Object (ไม่ใช่ JSON String,แปลงด้วย JSON.parse)
                  console.log("--SUCCESS--");
                  for (x in data) {
                     document.getElementById("demo").innerHTML += x + "=" + data[x];
                  }
                  //var JSONArray = JSON.parse(data);
                  //console.log(JSONArray);
               },
               error: function(response) {
                  console.log("--ERROR--");
                  var r = jQuery.parseJSON(response.responseText);
                  alert("Message: " + r.Message);
                  alert("StackTrace: " + r.StackTrace);
                  alert("ExceptionType: " + r.ExceptionType);
               }

            });
         }

      });
   </script>
</body>