

<?php 
require('header.php');
require('SQL/connection.php');
require("getid3/getid3.php");
$res=$conn->query("Select * from songs");
$id3 = new getID3;
$i=0;
echo "<div class=\"d-flex flex-row \">";
while($row=$res->fetch_assoc())

{
    $song=array($row["song_id"]=>$row["path"]);
  
    $Path=$row["path"];
    
    $OldThisFileInfo = $id3->analyze($Path);
  
    $i++;
    file_put_contents("image".strval($i).".jpg", $OldThisFileInfo['comments']['picture'][0]['data']);

    echo "<div class=\"card \" id=".$row["song_id"]." onclick=hun(this) style=\"width: 18rem;\">
    <img src=\"image".strval($i).".jpg\" class=\"card-img-top\" alt=\"...\">
    <div class=\"card-body\">
      <p class=\"card-text\">".$row["name"]."</p>
      
    </div>
  </div>";

}



?>
</div>

<div class="mb-2 d-flex justify-content-center flex-row fixed-bottom" style="background-color:aqua;">
<div class="now">

<p>Now Playing </p>
</div>
<svg class="m-3 play" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="36.861px" height="36.861px" viewBox="0 0 163.861 163.861" style="enable-background:new 0 0 163.861 163.861;" xml:space="preserve">
<g>
	<path d="M34.857,3.613C20.084-4.861,8.107,2.081,8.107,19.106v125.637c0,17.042,11.977,23.975,26.75,15.509L144.67,97.275   c14.778-8.477,14.778-22.211,0-30.686L34.857,3.613z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
<svg class="m-3 pause" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="36.861px" height="36.861px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
<path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M27,46h-8V14h8V46z M41,46h-8V14h8V46z"/>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
</div>
<audio id="audio">
<source id="main" src="" type="">
</audio>
<script>
var obj={};


function hun(me)
{
    var myObj;
    var path;
    var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
     myObj=JSON.parse(this.responseText);
     for(var i=0;i<myObj.length;i++)
{
        if(me.id==myObj[i]["song_id"])
        {
            path=myObj[i]["path"]
        }
}
    var h = document.querySelector("#audio")
    h.src=path;
    h.play();

  }
};
xmlhttp.open("GET", "actions/songs.php", true);
xmlhttp.send();



}
document.querySelector(".pause").addEventListener('click',function(){
    document.querySelector("audio").pause()

})
document.querySelector(".play").addEventListener('click',function(){
    document.querySelector("audio").play()

})

</script>



