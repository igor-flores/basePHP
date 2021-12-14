<button class="testa-json btn btn-outline-success" url="">Pag Inicial</button>
<button class="testa-json btn btn-outline-success" url="SQL">SQL</button>
<button class="testa-json btn btn-outline-success" url="Render">Render</button>
<div class="card text-start|center|end">
  <div class="card-body" id="xhr-response">
  </div>
</div>
<script>
    document.querySelectorAll('.testa-json').forEach(function (btn) {
        btn.addEventListener('click', function () {
            let url = btn.getAttribute('url');
            let xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {

                // Only run if the request is complete
                if (xhr.readyState !== 4) return;

                // Process our return data
                if (xhr.status >= 200 && xhr.status < 300) {
                    document.querySelector('#xhr-response').innerHTML = xhr.response;
                } else {
                    // This will run when it's not
                    console.log('The request failed!');
                }
            };

            xhr.open('GET', '<?= _PATH ?>' + url);
            xhr.send();
        });
    });
</script>