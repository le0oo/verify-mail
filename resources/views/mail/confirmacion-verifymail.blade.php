<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}

/* If the above doesn't work, add a .g-img class to any image in question. */
img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size you'd like to fix */

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}

    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

	    .primary{
	background: #30e3ca;
}
.bg_white{
	background: #ffffff;
}
.bg_light{
	background: #fafafa;
}
.bg_black{
	background: #000000;
}
.bg_dark{
	background: rgba(0,0,0,.8);
}
.email-section{
	padding:2.5em;
}

/*BUTTON*/

.btn{
	padding: 10px 15px;
	display: inline-block;
}
.btn.btn-primary{
	border-radius: 5px;
	background: #30e3ca;
	color: #ffffff;
}
.btn.btn-white{
	border-radius: 5px;
	background: #ffffff;
	color: #000000;
}
.btn.btn-white-outline{
	border-radius: 5px;
	background: transparent;
	border: 1px solid #fff;
	color: #fff;
}
.btn.btn-black-outline{
	border-radius: 0px;
	background: transparent;
	border: 2px solid #000;
	color: #000;
	font-weight: 700;
}

h1,h2,h3,h4,h5,h6{
	font-family: 'Lato', sans-serif;
	color: #000000;
	margin-top: 0;
	font-weight: 400;
}

body{
	font-family: 'Lato', sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0,0,0,.4);
}

a{
	color: #30e3ca;
}

table{
}
/*LOGO*/

.logo h1{
	margin: 0;
}
.logo h1 a{
	color: #30e3ca;
	font-size: 24px;
	font-weight: 700;
	font-family: 'Lato', sans-serif;
}

/*HERO*/
.hero{
	position: relative;
	z-index: 0;
}

.hero .text{
	color: rgba(0,0,0,.3);
}
.hero .text h2{
	color: #000;
	font-size: 40px;
	margin-bottom: 0;
	font-weight: 400;
	line-height: 1.4;
}
.hero .text h3{
	font-size: 24px;
	font-weight: 300;
}
.hero .text h2 span{
	font-weight: 600;
	color: #30e3ca;
}


/*HEADING SECTION*/
.heading-section{
}
.heading-section h2{
	color: #000000;
	font-size: 28px;
	margin-top: 0;
	line-height: 1.4;
	font-weight: 400;
}
.heading-section .subheading{
	margin-bottom: 20px !important;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(0,0,0,.4);
	position: relative;
}
.heading-section .subheading::after{
	position: absolute;
	left: 0;
	right: 0;
	bottom: -10px;
	content: '';
	width: 100%;
	height: 2px;
	background: #30e3ca;
	margin: 0 auto;
}

.heading-section-white{
	color: rgba(255,255,255,.8);
}
.heading-section-white h2{
	font-family: 
	line-height: 1;
	padding-bottom: 0;
}
.heading-section-white h2{
	color: #ffffff;
}
.heading-section-white .subheading{
	margin-bottom: 0;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(255,255,255,.4);
}

ul.social{
	padding: 0;
}
ul.social li{
	display: inline-block;
	margin-right: 10px;
}

/*FOOTER*/

.footer{
	border-top: 1px solid rgba(0,0,0,.05);
	color: rgba(0,0,0,.5);
}
.footer .heading{
	color: #000;
	font-size: 20px;
}
.footer ul{
	margin: 0;
	padding: 0;
}
.footer ul li{
	list-style: none;
	margin-bottom: 10px;
}
.footer ul li a{
	color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
	<center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;">
    	<!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="top" style="padding: 1em 2.5em 0 2.5em; background: #ffffff;">
          	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
          		<tr>
          			<td style="text-align: center;">
                  <h1 style="margin: 0;">
                    <a style="color: #30e3ca; font-size: 24px; font-weight: 700; font-family: 'Lato', sans-serif;" href="#">Verificacion</a>
                  </h1>
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr><!-- end tr -->
	      <tr>
          <td valign="middle" style="padding: 3em 0 2em 0; position: relative; z-index: 0; background: #ffffff;">
            <img src="{{url('/img/grupojunin.jpg')}}" alt="" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
            {{-- <svg version="1.1" id="Capa_1" class="w-36 h-36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 566.9 566.9" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;" xml:space="preserve">
            <style type="text/css">
              .st0{fill:#187A79;}
            </style>
            <g id="g115" transform="matrix(1.9033681,0,0,1.9033681,62.582684,-44.848992)" inkscape:export-filename="C:\Users\Marcelo\Layer1001.png" inkscape:export-xdpi="96" inkscape:export-ydpi="96">
              <g id="g111">
                  <path id="path89" inkscape:connector-curvature="0" class="st0" d="M190.5,272.8l-3.2,6.2h2.3l5.2-6.2c-0.2-0.5-0.9-0.8-1.7-0.8
                      C192.3,272,191.3,272.3,190.5,272.8L190.5,272.8z"/>
                  <path id="path91" inkscape:connector-curvature="0" class="st0" d="M43.3,289.8h-9.9v3.5h4.5v10.2c-0.5,0.3-1.4,0.6-3.1,0.6
                      c-4.3,0-7.5-4.1-7.5-11.9c0-8.3,3.2-12,8.6-12c2.7,0,4.4,0.6,5.4,1.2l1.7-3.5c-1.8-1-4.3-1.7-7.8-1.7c-8.1,0-13.7,5.9-13.7,15.8
                      c0,10.5,5.3,16.2,13.6,16.2c4.1,0,6.4-0.6,8.3-1.8L43.3,289.8z"/>
                  <path id="path93" inkscape:connector-curvature="0" class="st0" d="M58,282.9c-0.4,0-0.7,0-1,0c-4.3,0-6.7,0.8-8.8,1.8v23.1h5.5
                      v-20.6c0.7-0.4,1.6-0.6,2.6-0.6c0.8,0,1.7,0.1,2.5,0.4l1.1-4L58,282.9z"/>
                  <path id="path95" inkscape:connector-curvature="0" class="st0" d="M81.2,306.3v-22.9h-5.5v20.3c-1,0.5-2.1,0.8-3.7,0.8
                      c-2.9,0-4.1-1.8-4.1-4.1v-17h-5.5V300c0,5.4,3,8.2,9.5,8.2C76.1,308.2,79.2,307.4,81.2,306.3L81.2,306.3z"/>
                  <path id="path97" inkscape:connector-curvature="0" class="st0" d="M93.9,304.7c-1,0-1.8-0.1-2.4-0.4v-17.7
                      c0.8-0.3,1.6-0.5,2.9-0.5c4.5,0,6.1,3.4,6.1,9.2C100.3,301.3,98.2,304.7,93.9,304.7L93.9,304.7z M94.4,282.9
                      c-3.9,0-6.6,0.8-8.5,1.8v30.2h5.5v-7.3c0.8,0.3,2.3,0.5,3.7,0.5c6.4,0,10.7-4.8,10.7-12.8C105.8,287.4,101.5,282.9,94.4,282.9
                      L94.4,282.9z"/>
                  <path id="path99" inkscape:connector-curvature="0" class="st0" d="M118.9,304.4c-3.8,0-4.7-4.3-4.7-8.9c0-4.7,0.8-9.1,4.7-9.1
                      c3.9,0,4.7,4.5,4.7,9.1C123.6,300.1,122.8,304.4,118.9,304.4z M129,295.5c0-7.3-3.3-12.7-10.1-12.7c-6.8,0-10.1,5.4-10.1,12.7
                      c0,7.2,3.3,12.6,10.1,12.6C125.7,308.2,129,302.7,129,295.5z"/>
                  <path id="path101" inkscape:connector-curvature="0" class="st0" d="M133.6,305c0,4.5-2.6,7.2-5.6,8.1v2.9
                      c5.2-0.7,9.8-4.5,9.8-11.2l0-28.2h-4.2L133.6,305z"/>
                  <path id="path103" inkscape:connector-curvature="0" class="st0" d="M156.7,304.4c-1.1,0.7-2.5,1-4.4,1c-3.3,0-4.9-2.2-4.9-5
                      v-17.1h-4v16.9c0,4.9,2.5,8,8.7,8c3.9,0,6.8-0.9,8.6-1.9l0-22.9h-4V304.4z"/>
                  <path id="path105" inkscape:connector-curvature="0" class="st0" d="M174.9,282.9c-3.9,0-6.7,0.7-8.9,1.7v23.1h4v-21.4
                      c1.3-0.5,2.4-0.9,4.6-0.9c4.2,0,5.1,2.5,5.1,4.8v17.5h4v-17.6C183.7,286.6,181.7,282.9,174.9,282.9L174.9,282.9z"/>
                  <path id="path107" inkscape:connector-curvature="0" class="st0" d="M192.9,283.3H189v24.4h3.9V283.3z"/>
                  <path id="path109" inkscape:connector-curvature="0" class="st0" d="M211.9,290.2v17.5h4v-17.6c0-3.5-2-7.2-8.8-7.2
                      c-3.9,0-6.7,0.7-8.9,1.7v23.1h4v-21.4c1.3-0.5,2.4-0.9,4.6-0.9C211,285.4,211.9,287.9,211.9,290.2L211.9,290.2z"/>
              </g>
              <path id="path113" inkscape:connector-curvature="0" class="st0" d="M69.1,206.4l-1.6-2.4c-14.2-21.8-10.3-46.9-10.1-48.1
                  c0.2-1.7,0.5-3.3,0.9-5c0.5,7,2.1,13.8,4.8,20.3c3.2,7.5,7.7,14.2,13.4,19.9c5.8,5.8,12.5,10.3,19.9,13.4
                  c5.6,2.4,11.5,3.9,17.5,4.6c5.3,1.3,10.7,2,15.9,2c15.9,0,31.5-6.3,45.1-18.2c9.9-8.6,15.3-17.2,16-18.2
                  c9.5-14.3,14.4-31.7,14.2-50.2c-0.2-14.4-3.2-24.2-3.4-24.7c-2-6.1-4.4-11.8-7.3-17.2c14.1,16.7,22.6,38.3,22.6,61.9
                  c0,53-43.1,96.1-96.1,96.1c-0.7,0-1.4,0-2.1,0C96.8,233.5,79.6,221.7,69.1,206.4L69.1,206.4z M121.2,39.7h-0.3
                  c-57.9,0.1-104.8,47-104.8,104.9c0,57.9,47,104.9,104.9,104.9c57.9,0,104.9-47,104.9-104.9C226,86.7,179.1,39.8,121.2,39.7z
                    M33.6,184.4c-5.5-12.3-8.5-25.8-8.5-39.9c0-6.2,0.6-12.5,1.8-18.6c0.1-0.5,0.3-0.9,0.4-1.4c5.2-16.4,17.6-38.2,47.4-49.3
                  c0.4-0.1,0.8-0.3,1.2-0.4l0.8-0.3l0,0c0.5-0.2,1-0.3,1.4-0.5c0.1,0,1.1-0.3,2.7-0.8l1.2-0.3c4.4-1,11.4-2.2,20-2.2c1,0,2,0,3.1,0.1
                  c9.6,0.4,24.1,2.6,38,11.1l0.4,0.2c0.5,0.3,2.2,1.3,4.7,3.2l0.2,0.1c2.8,2.1,5.5,4.4,8.1,7c2.4,2.3,4.8,4.9,6.8,7.5l0.2,0.2l0,0
                  c0.5,0.8,1,1.5,1.5,2.2c0,0-3.1-3.4-7.9-6.9c-3.7-2.6-7.7-4.9-11.9-6.6c-7.7-3.3-16-4.9-24.4-4.9c-8.5,0-16.7,1.7-24.4,4.9
                  c-7.5,3.2-14.2,7.7-19.9,13.4c-2.8,2.8-5.4,5.9-7.6,9.2c-11.5,13-18.4,27.5-20.5,43.1c-0.2,1.2-4.5,29.7,11.4,54.2
                  c0.3,0.5,0.6,0.9,0.9,1.5l0.3,0.4l0.6,0.8c5.4,7.9,12.4,14.9,20.8,21C60.9,223.1,43.5,205.9,33.6,184.4L33.6,184.4z M120.9,200.1
                  c-29.4,0-53.3-23.9-53.3-53.3c0-29.4,23.9-53.3,53.3-53.3c29.4,0,53.3,23.9,53.3,53.3C174.2,176.2,150.3,200.1,120.9,200.1
                  L120.9,200.1z M121.1,48.6c6.9,0,13.7,0.7,20.2,2.1c17,5.1,41.1,18.2,51.9,52c0.1,0.4,10.9,36.2-9.8,67.3l-0.2,0.3
                  c-0.6,0.9-4.6,6.9-11.4,13.4c2.8-3.9,5.2-8,7-12.4c3.3-7.7,4.9-16,4.9-24.4c0-3.1-0.2-6.1-0.7-9.1c1-23.3-10.6-40.4-14.3-45.3
                  c-2.9-3.5-6.6-7.5-11.2-11.4c-5.1-4.3-9.2-6.6-9.8-6.9c-16.8-10.2-34-12.3-45.5-12.3c-15.4,0-26.3,3.6-26.8,3.7
                  c-0.7,0.2-1.3,0.5-2,0.7l-2.6,1c-0.4,0.2-0.8,0.3-1.2,0.5l-1.9,0.8l-10.4,5.1c-0.6,0.4-1.3,0.7-1.9,1.1
                  C72.5,58.5,95.7,48.6,121.1,48.6L121.1,48.6z"/>
            </g>
            </svg>         --}}
          </td>
	      </tr><!-- end tr -->
				<tr>
          <td valign="middle" style="position: relative; z-index: 0; background: #ffffff; padding: 2em 0 4em 0;">
            <table>
            	<tr>
            		<td>
            			<div style="position: relative; z-index: 0; color: rgba(0,0,0,.3);padding: 0 2.5em; text-align: center;">
            				<h2 style="color: #000; font-size: 40px; margin-bottom: 0; font-weight: 400; line-height: 1.4;">Por favor Verifique su Email</h2>
            				<h3 style="font-size: 24px; font-weight: 300;">Haga click en el siguiente boton para verificar.</h3>
            				<p><a href="{{url('/verify/verifymail/'. $verify_code)}}" style="padding: 10px 15px; display: inline-block; border-radius: 5px; background: #30e3ca; color: #ffffff;">Verificar</a></p>
            			</div>
            		</td>
            	</tr>
            </table>
          </td>
	      </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td valign="middle" style="background: #fafafa; border-top: 1px solid rgba(0,0,0,.05); color: rgba(0,0,0,.5); padding:2.5em;">
            <table>
            	<tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                      	<h3 style="	color: #000; font-size: 20px;">Quienes Somos</h3>
                      	<p>Grupo Servicios Junin</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                      	<h3 style="	color: #000; font-size: 20px;">Contacto</h3>
                      	<ul style="	margin: 0; padding: 0;">
					                <li style="	list-style: none; margin-bottom: 10px;"><span style="color: rgba(0,0,0,.3);">C. Suarez 27, Junin, Buenos Aires, Argentina</span></li>
					                <li style="	list-style: none; margin-bottom: 10px;"><span style="color: rgba(0,0,0,.3);">+54 2364 630 063</span></a></li>
					              </ul>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 10px;">
                      	<h3 style="	color: #000; font-size: 20px;">Webs</h3>
                      	<ul style="	margin: 0; padding: 0;">
					                <li style="list-style: none; margin-bottom: 10px;"><a style="color: rgba(0,0,0,1);" href="#">Grupo Servicios Junin</a></li>
					                <li style="list-style: none; margin-bottom: 10px;"><a style="color: rgba(0,0,0,1);" href="#">ACERCA</a></li>
					                <li style="list-style: none; margin-bottom: 10px;"><a style="color: rgba(0,0,0,1);" href="#">Gas Junin</a></li>
					                <li style="list-style: none; margin-bottom: 10px;"><a style="color: rgba(0,0,0,1);" href="#">Ciudad Inteligente</a></li>
					              </ul>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end: tr -->
        <tr>
          <td style="background: #fafafa; text-align: center;">
          	<p>Por favor no responder este email <a href="{{url('/verify/verifymail')}}" style="color: rgba(0,0,0,.8);">Eliminar Suscripción</a></p>
          </td>
        </tr>
      </table>

    </div>
  </center>
</body>
</html>