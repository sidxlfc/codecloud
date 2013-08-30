<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>Code Cloud</title>
</head>
<body>
<div id="wrapper">
<div class="content" style="width: 950px">
    <div class="column2" style="margin-top: 47px">
        <p>Enter the name of the file you wish to save. </p>
        <form action="writeFile.php" method="post">
            Name of File <input type="text" name="fileName"/> <br>
            <input type="submit" value="Save!"/>
            <textarea id="textarea" style="width:600px; height:600px" name="fileContents">
                <?php 
                    session_start();
                    $fileName=$_POST['fileName'];
                    $email = $_SESSION['sessionVar'];
                    $filePath=  '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$fileName;
                    $file = fopen($filePath, "a+") or exit("Unable to open file!");

                    while(!feof($file))
                    {
                        echo fgets($file);
                    }
                    fclose($file);
                ?>    
        
            </textarea> 
        </form>
        <br>
    </div>
    <div class="column1" >
       <div id="compile">
            <p>The compiling feature works only for C/C++ right now and uses GCC. The object file is Linux compatible. </p>
            <form action="compileFile.php" method="post">
                <input type="text" name="fileName" placeholder="helloWorld.c"/> <br>
                <input type="submit" value="Compile!"/>
            </form>
        </div>
    </div>
</div>
</div>



<script>

function inject(callback) {
    var baseUrl = "src/";
    
    var load = window.__ace_loader__ = function(path, module, callback) {
        var head = document.getElementsByTagName('head')[0];
        var s = document.createElement('script');
    
        s.src = baseUrl + path;
        head.appendChild(s);
        
        s.onload = function() {
            window.__ace_shadowed__.require([module], callback);
        };
    };

    load('ace-bookmarklet.js', "ace/ext/textarea", function() {
        var ace = window.__ace_shadowed__;
        
        ace.options.mode = "javascript";
        var Event = ace.require("ace/lib/event");
        var areas = document.getElementsByTagName("textarea");
        for (var i = 0; i < areas.length; i++) {
            Event.addListener(areas[i], "click", function(e) {
                if (e.detail == 3) {
                    ace.transformTextarea(e.target, load);
                }
            });
        }
        callback && callback();
    });
}

// Call the inject function to load the ace files.
var textAce;
inject(function () {
    // Transform the textarea on the page into an ace editor.
    var ace = window.__ace_shadowed__;
    var t = document.querySelector("textarea");
    textAce = ace.transformTextarea(t, window.__ace_loader__);
    setTimeout(function(){textAce.setDisplaySettings(true)});
});


document.getElementById("buBuild").onclick = function() {
    var injectSrc = inject.toString().split("\n").join("");
    injectSrc = injectSrc.replace('baseUrl = "src/"', 'baseUrl="' + document.getElementById("srcURL").value + '"');

    var aceOptions = textAce.getOptions();
    var opt = [];
    for (var option in aceOptions) {
        opt.push(option + ":'" + aceOptions[option] + "'");
    }
    injectSrc = injectSrc.replace('ace.options.mode = "javascript"', 'ace.options = { ' + opt.join(",") + ' }');
    injectSrc = injectSrc.replace(/\s+/g, " ");

    var a = document.querySelector("a");
    a.href = "javascript:(" + injectSrc + ")()";
    a.innerHTML = "Ace Bookmarklet Link";
}

</script>

</body>
</html>
