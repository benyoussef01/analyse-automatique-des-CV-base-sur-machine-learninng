<?php
$offre_id = $_SESSION['connecte']['offre_id'];
$offre = getOffreById($offre_id);
$cv = $offre['libelle'];
?>
<div class="card-body">
    <h3 class="text-center">Analyse du CVs</h3>
    <form method="get">
        <div class="form-group">
            <label for="">Mot clés</label>
            <input type="hidden" name="cvType" id="cvType" value="<?= $cv ?>">
            <input class="form-control" required type="text" name="keyword" id="motCle">
        </div>
        <button type="button" id="btn" name="analyse" class="btn btn-sm btn-primary btn-block">Analyse</button>
    </form>
    <script>
        const btn = document.getElementById('btn');
        
        btn.addEventListener('click', function() {
            const cvType = document.getElementById('cvType');
            const motCle = document.getElementById('motCle');
            const key = document.getElementById('key');
            key.innerText = motCle.value;
            const resultat = document.getElementById('resultat');
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Typical action to be performed when the document is ready:
                    const result = JSON.parse(xhttp.responseText);
                    console.log(typeof result);
                    let html = "";
                    for(let r in result){
                        html+=`<tr><td>${result[r]}</td></tr>`;
                    }
                    resultat.innerHTML = html;
                    //console.log("response: " + xhttp.responseText);
                }
            };
            xhttp.open("GET", `http://127.0.0.1:5000/?cvType=${cvType.value}&motCle=${motCle.value}`, true);
            xhttp.send();
            /*const xhr = new XMLHttpRequest();
            xhr.open('GET', `http://127.0.0.1:5000/?cvType=${cvType.value}&motCle=${keyword.value}`)
            xhr.onload = function(){
                if(xhr.status == 200 && xhr.onreadystatechange == 4){
                    console.log(xhr.responseText);
                }
            }
            xhr.send();*/
        });
    </script>
</div>