<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>


        
        <script>
            function recipe()
            {
                request = new XMLHttpRequest();
                // console.log("1 - request object created");
                //q is the query parameter
                //this is what we want the user to input

                <?php
                $input = $_POST["input"];
                ?>
                var query = <?php echo $input; ?>;
                alert(query);

                // query = document.getElementById("input").value;

                // url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita";
                url = "https://api.edamam.com/search?q=chicken&app_id=ea82839e&app_key=6e8bc70b6a0631d3b4b16b5c4a135d65";
                // url = "https://api.edamam.com/search?q=" + query +
                 // "&app_id=ea82839e&app_key=6e8bc70b6a0631d3b4b16b5c4a135d65";
                request.open("GET", url, true)
                // console.log("2 - opened request file");
            //runs when the state changes
            request.onreadystatechange = function()
            {
                //if the operation is complete and the status is complete
                if (request.readyState == 4 && request.status == 200)
                {
                    // console.log("5 - response received");
                    //gets the data
                    result = request.responseText;
                    //writing the raw data
                    // document.getElementById("data").innerHTML = result
                    // + "<br/><br/>";

                    //putting the data back into the object
                    food = JSON.parse(result);

                    // document.getElementById("query").innerHTML +=
                    // food.q;

                    numRecipes = food.to;
                    for (i=0; i<numRecipes; i++)
                    {
                        document.getElementById("format").innerHTML +=
                        food.hits[i].recipe.label + ", ";
                    }


                }
                //request status is not yet ready
                else if (request.readyState == 4 && request.status != 200) {

                    document.getElementById("data").innerHTML = "Something " +
                        "is wrong!  Check the logs to see where this went off "
                        + "the rails";

                }
                //request state is not yet ready
                else if (request.readyState == 3) {

                    document.getElementById("data").innerHTML = "Too soon!" +
                        "Try again";

                }
            }
            // sending the request for the data from the web server
            request.send();
            console.log("4 - Request sent");
        }


        </script>
    </head>
    <body onload="recipe()">

        <!-- <form method="post" onsubmit="recipe()">

            <div id="text">

                Input ingredient: <input type="text" id="input" name="input">

            </div>

            <br><br>
            <input type="submit" value="Submit">

        </form> -->

        <div id="data"></div><br><br><br><br>
        <!-- label = name of recipe, source = where recipe is from, url = link to recipe  -->



        <div id="query">Keyword used: </div><br><br>
        <div id="format"></div>


    </body>
</html>
