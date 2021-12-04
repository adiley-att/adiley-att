<html>
  <head>
    <title>Quadro de Anuncios</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  </head>
  <body style="margin: 0; padding: 0; text-align: center; background-color:powderblue; font-size:20px; font-family: NotoSans,Arial,'Arial Unicode MS',sans-serif;">
    <div style="margin-block-start: 0;">
        <h1 id="data" style="margin-block-start: 0; margin-block-end: 0; padding-top: 10px; padding-bottom: 10px;">Quadro de Anuncios</h1>
    </div>
    <iframe id="frame" src="" width="100%" height="85%">
    </iframe>
    <div>
        <nav>
            <ul style="list-style: none;">
                <form method="post">
                    <!-- <li style="list-style: none; display: inline; padding-right: 10px;">
                    <input style="border: none; text-decoration: none; cursor: pointer; margin: 4px 2px; padding: 12px 16px; font-size: 16px; background-color: #8DB3B8;" type="submit" name="anterior" value="ANTERIOR"/>
                    </li>

                    <li style="list-style: none; display: inline;">
                    <input style="border: none; text-decoration: none; cursor: pointer; margin: 4px 2px; padding: 12px 16px; font-size: 16px; background-color: #8DB3B8;"type="submit" name="atual" value="ATUAL"/>
                    </li>

                    <li style="list-style: none; display: inline; padding-left: 10px;">
                    <input style="border: none; text-decoration: none; cursor: pointer; margin: 4px 2px; padding: 12px 16px; font-size: 16px; background-color: #8DB3B8;" type="submit" name="proxima" value="PROXIMA"/>
                    </li> -->

                    <input type="week" id="semana" name="semana" style="border: none; text-decoration: none; cursor: pointer; margin: 4px 2px; padding: 12px 16px; font-size: 16px; background-color: #8DB3B8;">
                    <input type="submit" name="irSemana" value="Ir para semana" style="border: none; text-decoration: none; cursor: pointer; margin: 4px 2px; padding: 12px 16px; font-size: 16px; background-color: #8DB3B8;">

            </ul>
        </nav>
    </div>
  </body>
</html>

<script type="text/javascript">
    function AtualizaIframe(semana, segunda, semanaRaw){

      var xhr = new XMLHttpRequest();
      xhr.open('HEAD', "arquivos/"+semana+".pdf", false);
      xhr.send();
      
      if (xhr.status == "404") {          
        document.getElementById("frame").src = "arquivos/fail.pdf";
        document.getElementById("data").innerHTML = "Semana de "+segunda;        
      } else {
        document.getElementById("frame").src = "arquivos/"+semana+".pdf";
        document.getElementById("data").innerHTML = "Semana de "+segunda;
      }
    }
</script>

<?php

    function DataHoje(){
        return date('W');
    } 
        
    $semana = DataHoje();

    $week_start = date("d/m/y", strtotime('monday this week')); 

    echo "<script type='text/javascript'>AtualizaIframe('$semana', '$week_start');</script>";

    if(isset($_POST['irSemana'])) {
            $semana = new DateTime($_POST['semana']);
            $semana = $semana->format("W");

            $segunda = new DateTime($_POST['semana']);
            
            
            $segunda = $segunda->format("d/m/y");

          echo "<script type='text/javascript'>AtualizaIframe('$semana', '$segunda');</script>";
        }


    //   if(isset($_POST['anterior'])) {
    //       $semana--;
    //       echo "<script type='text/javascript'>AtualizaIframe('$semana');</script>";
    //   }
    //   if(isset($_POST['atual'])) {
    //       $semana = DataHoje();
    //     echo "<script type='text/javascript'>AtualizaIframe('$semana');</script>";
    //   }
    //   if(isset($_POST['proxima'])) {
    //     $semana++;
    //     echo "<script type='text/javascript'>AtualizaIframe('$semana');</script>";
    // }
?>
