<html>
    <body>
        <form>
            <button  onmouseover="demo()">ABC</button>
            <br>
            <div id="abc" style="height:500px;width:500px;background-color:blue;"></div>
        </form>
        <script>
            function demo(){
                document.getElementById("abc").style.backgroundColor="red";
            }
        </script>
        
    </body>
</html>
