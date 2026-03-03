 <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

  
    const qrcodeContainer = document.getElementById('qrcode');
    const gerarBtn = document.getElementById('gerar');
    const baixarBtn = document.getElementById('baixar');
    const linkImg = document.getElementById('linkImg');

    let qrcode = null;

    function gerarQRCode() {
      const texto = document.getElementById('texto').value.trim();
      const tamanho = parseInt(document.getElementById('tamanho').value) || 300;

      // limpa
      qrcodeContainer.innerHTML = '';
      qrcode = new QRCode(qrcodeContainer, {
        text: texto || ' ',
        width: tamanho,
        height: tamanho,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
      });

      // espera o DOM gerar (img ou canvas) — então habilita o download
      setTimeout(prepararDownload, 150);
    }

    function prepararDownload() {
      // qrcodejs gera <img> ou <canvas> dependendo do navegador
      const img = qrcodeContainer.querySelector('img');
      const canvas = qrcodeContainer.querySelector('canvas');

      if (canvas) {
        const dataURL = canvas.toDataURL('image/png');
        linkImg.href = dataURL;
        linkImg.style.display = 'inline-block';
        linkImg.download = 'qrcode.png';
        baixarBtn.style.display = 'inline-block';
        baixarBtn.onclick = () => linkImg.click();
      } else if (img) {
        // converte img -> canvas para garantir compatibilidade quando for baixar
        const image = new Image();
        image.onload = () => {
          const c = document.createElement('canvas');
          c.width = image.width;
          c.height = image.height;
          const ctx = c.getContext('2d');
          ctx.fillStyle = '#fff';
          ctx.fillRect(0,0,c.width,c.height);
          ctx.drawImage(image, 0, 0);
          const dataURL = c.toDataURL('image/png');
          linkImg.href = dataURL;
          linkImg.style.display = 'inline-block';
          linkImg.download = 'qrcode.png';
          baixarBtn.style.display = 'inline-block';
          baixarBtn.onclick = () => linkImg.click();
        };
        image.src = img.src;
      } else {
        // nenhum elemento gerado
        linkImg.style.display = 'none';
        baixarBtn.style.display = 'none';
      }
    }

    // eventos
    gerarBtn.addEventListener('click', gerarQRCode);
    // gera ao carregar com valor padrão
    window.addEventListener('load', gerarQRCode);

