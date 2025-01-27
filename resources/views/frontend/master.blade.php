<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project UTS</title>
    <meta property="og:title" content="Seminar Nasional Teknik Elektro" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        html { line-height: 1.15; }
        body { margin: 0; }
        * { box-sizing: border-box; border-width: 0; border-style: solid; }
        p, li, ul, pre, div, h1, h2, h3, h4, h5, h6, figure, blockquote, figcaption { margin: 0; padding: 0; }
        button { background-color: transparent; }
        button, input, optgroup, select, textarea { font-family: inherit; font-size: 100%; line-height: 1.15; margin: 0; }
        button, select { text-transform: none; }
        button, [type="button"], [type="reset"], [type="submit"] { appearance: button; }
        button::-moz-focus-inner, [type="button"]::-moz-focus-inner, [type="reset"]::-moz-focus-inner, [type="submit"]::-moz-focus-inner { border-style: none; padding: 0; }
        button:-moz-focus, [type="button"]:-moz-focus, [type="reset"]:-moz-focus, [type="submit"]:-moz-focus { outline: 1px dotted ButtonText; }
        a { color: inherit; text-decoration: inherit; }
        input { padding: 2px 4px; }
        img { display: block; }
        html { scroll-behavior: smooth; }
    </style>
    <style>
        html {
            font-family: "Titillium Web";
            font-size: 16px;
        }
        body {
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            text-transform: none;
            letter-spacing: normal;
            line-height: 1.15;
            color: black;
            background-color: white;
            fill: black;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/animate.css@4.1.1/animate.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" data-tag="font" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" data-tag="font" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&amp;display=swap" data-tag="font" />
    <link rel="stylesheet" href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
    <!--This is the head section-->
    <!-- <script type="text/javascript"> ... </script> -->
</head>

<body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM fully loaded and parsed');

            // Function to show the registration pop-up
            function showRegistrationPopup() {
                // Create a div element for the pop-up
                var popup = document.createElement('div');
                popup.classList.add('popup');

                // Create a form inside the pop-up
                var form = document.createElement('form');
                form.classList.add('popup-form');

                // Create a close button
                var closeButton = document.createElement('button');
                closeButton.classList.add('popup-close-button');
                closeButton.innerHTML = '&times;'; // Close icon (X)

                // Create a title for the form
                var title = document.createElement('h2');
                title.textContent = 'Registrasi';

                // Create a text input for name
                var nameInput = document.createElement('input');
                nameInput.setAttribute('type', 'text');
                nameInput.setAttribute('placeholder', 'Enter your name');
                nameInput.required = true;

                // Create a text input for email address
                var emailInput = document.createElement('input');
                emailInput.setAttribute('type', 'email');
                emailInput.setAttribute('placeholder', 'Enter your email address');
                emailInput.required = true;

                // Create a text input for university
                var universityInput = document.createElement('input');
                universityInput.setAttribute('type', 'text');
                universityInput.setAttribute('placeholder', 'Enter your university');
                universityInput.required = true;

                // Create a submit button
                var submitButton = document.createElement('button');
                submitButton.setAttribute('type', 'submit');
                submitButton.textContent = 'Submit';

                // Append title, inputs, and buttons to the form
                form.appendChild(closeButton);
                form.appendChild(title);
                form.appendChild(nameInput);
                form.appendChild(emailInput);
                form.appendChild(universityInput);
                form.appendChild(submitButton);
                popup.appendChild(form);

                // Append the pop-up to the body
                document.body.appendChild(popup);

                // Prevent scrolling when the pop-up is open
                document.body.style.overflow = 'hidden';

                // Close the pop-up when the close button is clicked
                closeButton.addEventListener('click', closeRegistrationPopup);

                // Handle form submission
                form.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent form submission
                    console.log('Form submitted');

                    var name = nameInput.value;
                    var emailAddress = emailInput.value;
                    var university = universityInput.value;

                    fetch('/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            name: name,
                            email: emailAddress,
                            university: university
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.message);
                        closeRegistrationPopup();
                    })
                    .catch(error => console.error('Error:', error));
                    closeRegistrationPopup();
                });
            }

            // Function to close the registration pop-up
            function closeRegistrationPopup() {
                var popup = document.querySelector('.popup');
                if (popup) {
                    popup.remove(); // Remove the pop-up from the DOM
                    document.body.style.overflow = ''; // Enable scrolling
                }
            }

            // Function to show the submit pop-up
            function showSubmitPopup() {
                console.log('showSubmitPopup called');
                // Create a div element for the pop-up
                var popup = document.createElement('div');
                popup.classList.add('popup');

                // Create a form inside the pop-up
                var form = document.createElement('form');
                form.classList.add('popup-form');

                // Create a close button
                var closeButton = document.createElement('button');
                closeButton.classList.add('popup-close-button');
                closeButton.innerHTML = '&times;'; // Close icon (X)

                // Create a title for the form
                var title = document.createElement('h2');
                title.textContent = 'Submit Your Drive Link';

                // Create a text input for email address
                var emailInput = document.createElement('input');
                emailInput.setAttribute('type', 'email');
                emailInput.setAttribute('placeholder', 'Enter your email address');
                emailInput.required = true;

                // Create a text input for Drive link
                var linkInput = document.createElement('input');
                linkInput.setAttribute('type', 'url');
                linkInput.setAttribute('placeholder', 'Enter your Drive link');
                linkInput.required = true;

                // Create a submit button
                var submitButton = document.createElement('button');
                submitButton.setAttribute('type', 'submit');
                submitButton.textContent = 'Submit';

                // Append title, inputs, and buttons to the form
                form.appendChild(closeButton);
                form.appendChild(title);
                form.appendChild(emailInput);
                form.appendChild(linkInput);
                form.appendChild(submitButton);
                popup.appendChild(form);

                // Append the pop-up to the body
                document.body.appendChild(popup);

                // Prevent scrolling when the pop-up is open
                document.body.style.overflow = 'hidden';

                // Close the pop-up when the close button is clicked
                closeButton.addEventListener('click', closeSubmitPopup);

                // Handle form submission
                form.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent form submission
                    console.log('Submit form submitted')

                    var email = emailInput.value;
                    var link = linkInput.value;

                    fetch('/submit-link', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            email: email,
                            link: link
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.message);
                        closeSubmitPopup();
                    })
                    .catch(error => console.error('Error:', error));
                    closeSubmitPopup();
                });
            }

            // Function to close the submit pop-up
            function closeSubmitPopup() {
                var popup = document.querySelector('.popup');
                if (popup) {
                    popup.remove(); // Remove the pop-up from the DOM
                    document.body.style.overflow = ''; // Enable scrolling
                }
            }

            // Add event listener to the buttons
            document.querySelector('.button-secondary')?.addEventListener('click', showRegistrationPopup);
            document.querySelector('.button-primary')?.addEventListener('click', showSubmitPopup);
        });
    </script>


  <!--HEADER-->
  <link rel="stylesheet" href="style.css">
  <div>
      <link rel="stylesheet" href="index.css">
      <div class="home-container">
          <div class="home-navbar navbar-container">
              <div class="max-width">
                  <header data-thq="thq-navbar" class="home-navbar-interactive">
                      <div class="home-logo">
                          <img alt="image" src="img/logo.jpg" class="home-image" />
                          <span class="brandName">
                              <span class="home-text001">Seminar Nasional</span>
                              <br />
                              <span class="home-text002">Teknik Elektro</span>
                          </span>
                      </div>
                      <div data-thq="thq-navbar-nav" class="home-desktop-menu">
                          <div class="home-links">
                            
                            <a href="#narasumber">
                                <span class="home-text003 navbarLink">Pembicara</span>
                            </a>         

                            <a href="#materi">
                                <span class="home-text004 navbarLink">Materi</span>
                            </a>  

                            <a href="#faq">
                                <span class="home-text005 navbarLink">Timeline</span>
                            </a>  

                              <button class="button-secondary button">Registrasi</button>
                              <button class="button button-primary">Submit</button>
                          </div>
                      </div>
                  </header>
              </div> 
          </div>
  <!--HEADER-->
  <!--MAIN SECTION-->
          <div class="hero-container section-container">
            <div class="home-max-width1 max-width">
                <div class="home-content">
                    <h1 class="home-title">
                        <span>Seminar Nasional Teknik Elektro</span>
                    </h1>
                    <span class="home-description">
                      Merupakan prosiding yang berisi hasil-hasil pemikiran para peneliti yang diseminarkan dalam acara seminar nasional teknik elektro. Seminar Nasional Teknik Elektro diselenggarakan secara rutin setiap tahun oleh Jurusan Teknik Elektro, Politeknik Negeri Jakarta
                    </span>
                    <div class="home-container01">
                        <button class="home-button04 button button-gradient">Submit</button>
                        <button class="button button-transparent">Registrasi</button>
                    </div>
                </div>
                <div class="home-image2">
                    <img alt="image" src="img/poster.jpg" class="home-hero-image" />
                </div>
            </div>
          </div>

          <div class="section-container map">
            <div class="home-max-width2 max-width">
                <div class="home-image4">
                    <img alt="image" src="img/map.png" class="home-hero-image1" />
                </div>
                <div class="home-content1">
                    <h1 class="home-text018">
                        <span>Rabu, </span>
                        <span class="home-text020">26 Juni </span>
                        <span>2024</span><br>
                        <br>
                        <span>Aula Perpustakaan Politeknik Negeri Jakarta, Lantai 3.</span>
                    </h1>
                    <span class="home-text022">
                      Universitas Indonesia, Gedung Perpustakaan, Politeknik Negeri Jakarta, Kukusan, Beji, Depok City, West Java 16425. 
                    </span>
                    <div class="home-container02">
                        <a href="https://maps.app.goo.gl/kTizhUmk9LahDuaD6">
                          <button class="button-secondary button bg-transparent">Direction</button>
                        </a>
                    </div>
                </div>
            </div>
          </div>
  <!--MAIN SECTION-->
  <!--NARASUMBER-->
          <div class="section-container">
            <div class="home-max-width5 max-width">
                <h1 id="narasumber" class="home-text038">Narasumber:
                </h1>
                <div class="home-cards-container">
                    <div class="card-card card-root-class-name">
                        <div class="card-info">
                            <span class="card-text"><span>Dr. Capt. Antoni Arif Priadi, M.Sc</span></span>
                            <span class="card-text1">
                                <span>Direktur Jenderal Perhubungan Laut, Kementerian Perhubungan, Republik Indonesia</span>
                            </span>
                        </div>
                    </div>
                    <div class="card-card card-root-class-name2">
                        <div class="card-info">
                            <span class="card-text"><span>Prof. Shusaku Nomura</span></span>
                            <span class="card-text1">
                                <span>Nagaoka University of Technology</span>
                            </span>
                        </div>
                    </div>
                    <div class="card-card card-root-class-name1">
                        <div class="card-info">
                            <span class="card-text"><span>Prof. Dr. Ir. Eddy Supriyono, M.Sc</span></span>
                            <span class="card-text1">
                                <span>Doktor lImu Biosains Perairan, Departemen Budidaya Perairan, Fakultas Perikanan dan lImu Kelautan, IPB</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!--NARASUMBER-->
  <!--MATERI-->
<div class="home-section1 section-container"
          ><div class="home-max-width3 max-width"
            ><div class="home-content2"
              ><span class="home-text023 beforeHeading">SEMINAR NASIONAL TEKNIK ELEKTRO HADIR DENGAN TEMA:</span
              ><h1 id="materi" class="home-text024"
                ><span class="home-text025">Transformasi Industri 5.0 dalam Prespektif Kemaritiman</span><br /><span
                  class="home-text027"
                  >untuk Pencapaian Sustainable Development Goals (SDGs) melalui bidang Teknik Elektro</span
                ></h1
              ><span class="home-text028"
                >*Power System *Power Transmission *Power Generation *Power Distribution 
                *Protection and Insulation *Renewable or Green Energy 
                *Instrumentation and Control *Mechatronic and Robotic 
                *Electronic and Microelectronic *Embedded System * Biomedical Engineering
                *Electronic Material *Automation *Nano Technology *Telecommunication
                *Mobile Computing and Technology *Signal and Image Processing
                *Computer Network and Data Communication *Information Technology
                *Network Security *Multimedia and Animation *Artificial Intelligence 
                *Software Engineering *Web Programming</span
              ></div
            ><div class="home-image5"
              ><img
                alt="image"
                src="https://img.freepik.com/free-vector/man-woman-present-jobs-front-room-about-growth-company_1150-35052.jpg"
                class="home-hero-image2" /></div></div></div>
  <!--MATERI-->
  <!--timeline-->
  <div class="home-section2 section-container"
          ><div class="home-max-width4 max-width"
            ><div class="home-image6"
              ><img
                id="faq"
                alt="image"
                src="https://img.freepik.com/free-vector/company-employees-use-web-search-find-ideas-doing-business-company_1150-43196.jpg?size=338&ext=jpg&ga=GA1.1.1224184972.1714953600&semt=ais"
                class="home-hero-image3" /></div
            ><div class="home-content3"
              ><span class="home-text029 beforeHeading">info</span
              ><h1 class="home-text030">Timeline Pembuatan Makalah</h1
              ><div class="home-step"
                ><div class="home-number"
                  ><span class="home-text031">1</span></div
                ><div class="home-container04"
                  ><span class="home-title1">Pendaftaran & Penerimaan Makalah</span
                  ><span class="home-text032"
                    >15 April - 18 Mei 2024</span
                  ></div
                ></div
              ><div class="home-step1"
                ><div class="home-number1"
                  ><span class="home-text033">2</span></div
                ><div class="home-container05"
                  ><span class="home-title2">Batas Pengumuman Makalah Diterima</span
                  ><span class="home-text034"
                    >01 - 28 Mei 2024</span
                  ></div
                ></div
              ><div class="home-step2"
                ><div class="home-number2"
                  ><span class="home-text035">3</span></div
                ><div class="home-container06"
                  ><span class="home-title3"
                    >Final Manuskrip</span
                  ><span class="home-text036"
                    >20 Juni 2024</span
                  >
                  <br>
                  <br></div
                ></div
                ><div class="home-step2"
                ><div class="home-number2"
                    ><span class="home-text035">4</span></div
                ><div class="home-container06"
                    ><span class="home-title3"
                    >Pembayaran Terakhir Kontribusi Seminar</span
                    ><span class="home-text036"
                    >26 Juni 2024</span
                    ></div><div></div>
              </div
              ></div
            ></div
          ></div>
  <!--FAQ-->
        <div class="section-container">
          <div class="home-section4 section-container">
              <div class="home-max-width6 max-width">
                  <div class="home-banner">
                      <span class="home-text054 beforeHeading">partisipasi sekarang</span>
                      <h1 class="home-text055">
                          <span>Daftarkan makalah dan diri anda</span><br />
                      </h1>
                      <span class="home-text059">
                          <span>Kami tunggu partisipasi anda pada ajang </span><br />
                          <span>Seminar Nasional Teknik Elektro 2024. </span>
                      </span>
                      <div class="home-btns">
                          <button class="home-button08 button button-transparent">Registrasi</button>
                          <button class="home-button09 button button-gradient">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  <!--REGIST-->
  <!--FOOTER-->
  <footer class="home-footer">
    <div class="home-links-container">
        <div class="home-container07">
            <div class="footer-column contact-column">
                <span class="home-text063">Contact Person</span>
                <img src="img/cp.png" class="cp-image">
                <span class="home-text100">Nuha Nadhirah</span>
                <span class="home-text101">+62 857-5533-8422</span>
                <img src="img/cp.png" class="cp-image">
                <span class="home-text100">Respati Pranjav</span>
                <span class="home-text101">+62 857-2112-3264</span>
            </div>
            <div class="footer-column developer-column">
                <div class="developer-info">
                    <img src="img/foto-akmal.jpg" alt="Developer 1" class="developer-image">
                    <span class="home-text102">Akmal Faiz A</span>
                    <span class="home-text104">2203421041</span>
                    <span class="home-text105">BM-4B</span>
                </div>
                <div class="developer-info">
                    <img src="img/foto-talia.jpg" alt="Developer 2" class="developer-image">
                    <div class="developrt-text">
                        <span class="home-text102">Thalia Angel Ibrahim</span>
                        <span class="home-text104">2203421023</span>
                        <span class="home-text105">BM-4B</span>
                    </div>
                </div>
                <div class="footer column sosmed-column">
                    <div class="home-logo">
                        <img alt="image" src="img/fb.png" class="sosmed-image" />
                        <span class="sosmed-text">PoliteknikNegeriJakartaOfficial</span>
                    </div>
                    <div class="home-logo">
                        <img alt="image" src="img/ig.jpeg" class="sosmed-image" />
                        <span class="sosmed-text">politekniknegerijakarta</span>
                    </div>
                    <div class="home-logo">
                        <img alt="image" src="img/web.png" class="sosmed-image" />
                        <span class="sosmed-text">www.pnj.ac.id</span>
                    </div>
                    <div class="home-logo">
                        <img alt="image" src="img/x.png" class="sosmed-image" />
                        <span class="sosmed-text">@humasPNJ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
  <!--FOOTER-->
</div>
</div>
</body>
</html>
    
      