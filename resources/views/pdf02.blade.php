

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- link rel="stylesheet" href="./build/tailwind.css"  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,700i,800&display=swap" rel="stylesheet"> 
</head>

<style>
    @font-face {
            font-family: 'Open Sans', sans-serif;  
            src: local("Source Sans Pro"), url("fonts/sourcesans/sourcesanspro-regular-webfont.ttf") format("truetype");
          

        }        
        body, p ,h3, h2, h1, h4, h5{
           font-family: 'Open Sans', sans-serif;          
        }
	@page {margin: 0cm 0cm;}
    .text-base{font-size:12px;font-family: 'Roboto', sans-serif;}
    .text-small{font-size:10px;font-family: 'Roboto', sans-serif;}
    .text-xs{font-size:10px;font-family: 'Roboto', sans-serif;}
	.font-bold{ font-weight:bold;}
	.h-full {height: 100%;}
    .h-screen {height: 100vh;}
    .leading-none {line-height: .9;}
    .leading-tr {line-height: .8;}
    .leading-tight {line-height: 1.25;}
    .leading-snug {line-height: 1.375;}
    .leading-normal {line-height: 1.5;}
    .leading-relaxed {line-height: 1.625;}
    .leading-loose {line-height: 2;}
   
    .gray-top{background: #eee;}
    .subject{color:#7dcea0; font-variant: small-caps; font-size:12px; line-height: 1;font-family: 'Open Sans', sans-serif;}
    .title{color:#7dcea0; font-variant: small-caps;  font-weight:700; line-height: 1;font-family: 'Open Sans', sans-serif;}
    .small-text{font-size: 12px;}
	
	
	.bg-y{ background:  #e59866;}
	.bg-b{background:  #a9cce3;}
	.bg-g{background:  #7dcea0 ;}
    .bg-gradient {background: rgb(53, 94, 127);background: linear-gradient(90deg, rgba(53, 94, 127, 1) 0%, rgba(53, 94, 127, 1) 35%, rgba(137, 204, 202, 1) 100%);}
    .gap-top{ margin-top:4px;}
    .gap-bottom{ margin-bottom:2px;}
	.border-b{ 1px solid #eee;}
    .bg-teal-100{background:  #a9cce3;}
    .bg-gray-300{background: #eee;}
    .pl-4{padding-left: 4px;}
    .text-white{color:#FFF;}
    .text-10{ font-size: 10px; font-weight: bold;}
    .bg-gradient {background: #065d7e;}


    .mt-0{margin-top:0px;}
    .mt-5{margin-top:5px;}
    .mt-10{margin-top:10px;}
    .mt-15{margin-top:15px;}
    .mt-30{margin-top:30px;}

    .mtn-5{margin-top:-5px;}
    .mtn-10{margin-top:-10px;}
    .mtn-15{margin-top:-15px;}
    .mtn-20{margin-top:-20px;}

    .mb-50{margin-bottom:50px;}
    .pb-50{padding-bottom:50px;}

	.top-60{margin-top:-60px;}
    .mt-60{margin-top:60px;}

    .mr-0{margin-right:0px;}
    .mr-5{margin-right:5px;}
    .mr-10{margin-right:10px;}
    .mr-15{margin-right:15px;}
    .mr-20{margin-right:20px;}
    .mr-25{margin-right:25px;}
    .mr-30{margin-right:30px;}

    .ml-0{margin-left:0px;}
    .ml-5{margin-left:5px;}
    .ml-10{margin-left:10px;}
    .ml-20{margin-left:20px;}
    .ml-25{margin-left:25px;}

    .ml-50{margin-left:50px;}
    .ml-50{margin-left:50px;}
    .ml-50{margin-left:50px;}
    .ml-40{margin-left:40px;}
    .ml-15{margin-left:15px;}
    .ml-60{margin-left:60px;}
    .ml-65{margin-left:65px;}
    .ml-70{margin-left:70px;}
    .ml-75{margin-left:75px;}

    .pl-0{padding-left:0px;}
    .pl-5{padding-left:5px;}
    .pl-10{padding-left:10px;}
    .pl-11{padding-left:11px;}
    .pl-12{padding-left:12px;}
    .pl-15{padding-left:15px;}
    .pl-20{padding-left:20px;}
    .pl-25{padding-left:25px;}

    .pt-0{padding-top:0px;}
    .pt-5{padding-top:5px;}
    .pt-10{padding-top:10px;}
    .pt-15{padding-top:15px;}
    .pt-20{padding-top:20px;}
    .pt-25{padding-top:25px;}

    .pb-0{padding-bottom:0px;}
    .pb-5{padding-bottom:5px;}
    .pb-10{padding-bottom:10px;}
    .pb-15{padding-bottom:15px;}
    .pb-20{padding-bottom:20px;}
    .pb-25{padding-bottom:25px;}

    
	

	.uppercase{text-transform: uppercase;}
	.lowercase {text-transform: lowercase;}
	.capitalize{text-transform: capitalize;}

	.mln-30{margin-left:-30px;}
	.mln-31{margin-left:-31px;}
	.mln-32{margin-left:-32px;}
	.mln-33{margin-left:-33px;}
	.mln-34{margin-left:-34px;}
	.mln-35{margin-left:-35px;}
	.text-del{ color:#9da2a2;}
	.bg-del{ background:#eef1f1;}

    .text-teal-100{color: #e6fffa;}
    .text-teal-200{color: #b2f5ea;}
    .text-teal-300{color: #81e6d9;}
    .text-teal-400{color: #4fd1c5;}
    .text-teal-500{color: #38b2ac;}
    .text-teal-600{color: #319795;}
    .text-teal-700{color: #2c7a7b;}
    .text-teal-800{color: #285e61;}
    .text-teal-900{color: #234e52;}

    .bg-teal-100{background: #e6fffa;}
    .bg-teal-200{background: #b2f5ea;}
    .bg-teal-300{background: #81e6d9;}
    .bg-teal-400{background: #4fd1c5;}
    .bg-teal-500{background: #38b2ac;}
    .bg-teal-600{background: #319795;}
    .bg-teal-700{background: #2c7a7b;}
    .bg-teal-800{background: #285e61;}
    .bg-teal-900{background: #234e52;}

    .status{width:150px}
    .centre{vertical-align: middle}

	hr.new4 {border-top: 0.01em solid #9da2a2; margin-top: -4px;}
	table {width:100%; border-spacing: 0px; border-collapse: collapse; }
	tr{ border-collapse: collapse;}
	td{ border-collapse: collapse; border-bottom: 0.001em solid #dee0e3;padding-left: 5px; padding-top:2px; padding-bottom:2px; }


    /** #dee0e3**/

            /** Define now the real margins of every page in the PDF **/
    .body {margin-top: 8.3cm; margin-left: 1.6cm; margin-right: 1cm; margin-bottom: 2cm;}

            /** Define the header rules **/
    header {position: fixed; top: 0cm; left: 0cm; right: 0cm; height: 3cm;}

            /** Define the footer rules **/
    footer {position: fixed; bottom: 0cm; left: 0cm; right: 0cm; height: 2cm; width:100%}
</style>

	<header>
		<div class="row gray-top">
		<!-- DIV TOP-HEADER-ONE -->
			<div class="pull-right">
                
				<div class="mt-15 text-teal-900 text-small uppercase leading-none font-bold pl-10 status">
                    <p class="font-bold"> Delivery Status <img src="images/icomoon/SVG/stop.svg" width="15"  height="15" class="ml-10" /></p>
                </div>
				<div class="text-teal-900  text-small uppercase leading-none font-bold pl-10 status "> 
                    <p class="font-bold"> Vewing Status <img src="images/icomoon/SVG/signal_cellular_4_bar.svg" width="15"  height="15" class="ml-20" /></p>
                </div>
                <!--
				<div class="mt-15 text-teal-900 text-small uppercase leading-none font-bold pl-10 status mb-50 pb-50">
                    <p class="font-bold pull-left"> Delivery Status <br/> Vewing Status </p>
                    <p><img src="images/icomoon/SVG/check_box.svg" width="30"  height="30" class=" pull-right ml-20 centre" /></p>
                </div>
                -->
				<!-- style="background-image: url(./images/wave.svg);" -->
				<div class="">
					<div class="mt-15">
						<img src="images/wavet.png" width="200" style="overflow-x: hidden;" />
							<h3 class="text-teal-900 top-60 font-bold pl-10"> PROOF OF<br><span class="font-bold "> DELIVERY</span></h3>
					</div>
				</div>
			</div>
			<!-- font image-->
			<div class=" mt-60">
				<img src="images/vep-16.png" class="ml-50"/>
			</div>
			<!-- DIV TOP-HEADER-TWO -->
			<!-- TOP AREA OF POD -->
			<div class="row gray-top">
			<!-- DIV TOP-HEADER-TWO -->
				<div class=" leading-none ml-70">
					<h3 class="text-teal-500 leading-none text-xs">SUBJECT</h3>
					<h3 class="leading-none text-teal-900 title mtn-5">Brand Project Files For Group 3 Technology Ltd.</h3>
				</div>
				
			</div>
            <hr  class="new4">
			<!-- DIV TOP-HEADER-THREE -->
			<div class="row gray-top">
				<div class="col-xs-4 ml-50 pl-25">
					<div class="">
						<div class=" text-teal-500  leading-none   text-xs">TO</div>
						<div class=" text-teal-900 text-base font-bold">Jonathan</div>
					</div>
				</div>
				<div class="col-xs-4 ">
					<div class="">
						<div class="text-teal-500 leading-none  text-xs">DATE</div>
						<div class="text-teal-900 text-base font-bold">07-09-19</div>
					</div>
				</div>
				<div class="col-xs-3 ">
					<div class="">
						<div class="text-teal-500 leading-none  text-xs">POST</div>
						<div class="text-teal-900 text-base  font-bold">Registered</div>
					</div>
				</div>
			</div>
			<div class="row gray-top mt-15">
				<div class="col-xs-4 ml-50 pl-25" >
					<div class="pb-20">
						<div class="text-teal-500 leading-none text-xs">FROM</div>
						<div class="text-teal-900 font-bold"> Majid H Khan </div>
					</div>
				</div>
				<div class="col-xs-4 ">
					<div class="pb-20">
						<div class="text-teal-500 leading-none text-xs">ID</div>
						<div class="text-teal-900  font-bold">15069-45755-826</div>
					</div>
				</div>
				<div class="col-xs-3 ">
					<div class="pb-20">
						<div class="text-teal-500 leading-none text-xs">ePACKAGE</div>
						<div class="text-teal-900 font-bold">MULT</div>
					</div>
				</div>
			</div>
		</div>
	</header>
<body>
 <div class="body">
    <!-- ePACKAGE DETAILS AREA -->
    <div class="row mt-15">
        <h3 class="pl-0 text-teal-900 title"> ePackage Details</h3>
        <table>
            <thead class="pl-15 text-small">
                <tr class="bg-gradient ">
                    <th class="text-white uppercase pl-5">NAME</th>
                    <th class="text-white uppercase pl-5">SIZE</th>
                    <th class="text-white uppercase"></th>
                    <th class="text-white uppercase pl-5">DATE / TIME</th>
                    <th class="text-white"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-10">
                    <td class="text-teal-900"></td>
                    <td class="text-teal-900"></td>
                    <td class="pl-5">Sent</td>
                    <td class="pl-5">Received</td>
                    <td class="pl-5">Opened</td>
                </tr>
                        
                        
                        <!-- Data Row 1-->
                        <tr class="text-xs border-b leading-tr leading-none pl-5">
                            <td class="text-10 leading-none">File name one version2.pdf</td>
                            <td class="text-xs leading-none">2.2 MB</td>
                            <td class="text-xs leading-none">
                                <p>GMT <span class="px-3 leading-none">07-06-19 01:05:18<span> </p>
                                <p>Local <span class="px-2 leading-none">07-06-19 01:05:18<span> </p>
                        	</td>
							<td class="border-b px-2 py-0">
								<p>07-06-19 01:05:18 </p>
								<p>07-06-19 01:05:18 </p>
							</td>
							<td class="border-b px-2 py-0">
								<p>07-06-19 01:05:18 </p>
								<p>07-06-19 01:05:18 </p>
							</td>
                        </tr>
                        <!-- Data Row 2-->
                        <tr class="text-xs border-b bg-gray-300 leading-tr pl-5">
                            <td class="text-10">File name one version2.pdf</td>
                            <td class="text-xs">2.2 MB</td>
                            <td class="text-xs ">
                                <p>GMT <span class="px-3">07-06-19 01:05:18<span> </p>
                                <p>Local <span class="px-2">07-06-19 01:05:18<span> </p>

                            </td>
                            <td class="text-xs">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                            <td class="text-xs">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                        </tr>

                        <!-- Data Row 3 -->
                        <tr class="text-xs border-b leading-tr pl-5">
                            <td class="text-10">File name one version2.pdf</td>
                            <td class="text-xs">2.2 MB</td>
                            <td class="text-xs ">
                                <p>GMT <span class="px-3">07-06-19 01:05:18<span> </p>
                                <p>Local <span class="px-2">07-06-19 01:05:18<span> </p>

                            </td>
                            <td class="text-xs">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                            <td class="text-xs">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                        </tr>

                        <!-- Data Row 4-->
                        <tr class="text-xs border-b bg-gray-300 leading-tr pl-5">
                            <td class="text-10">File name one version2.pdf</td>
                            <td class="text-xs">2.2 MB</td>
                            <td class="text-xs ">
                                <p>GMT <span class="px-3">07-06-19 01:05:18<span> </p>
                                <p>Local <span class="px-2">07-06-19 01:05:18<span> </p>

                            </td>
                            <td class="text-xs">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                            <td class="text-xs">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                        </tr>


                        <!-- Deleted File Area -->
                        <tr class="text-10 text-del0 pl-5">
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            <td class="bg-del0 pl-5">Sent</td>
                            <td class="bg-del0 pl-5">Received</td>
                            <td class="bg-del0 pl-5">Destroyed</td>
                        </tr>
                        <tr class="text-xs border-b leading-tr text-del">
                            <td class="text-10">File name one version2.pdf</td>
                            <td class="text-xs text-gray-500">2.2 MB</td>
                            <td class="text-xs text-gray-500">
                                <p>GMT <span class="px-3">07-06-19 01:05:18<span> </p>
                                <p>Local <span class="px-2">07-06-19 01:05:18<span> </p>

                            </td>
                            <td class="text-xs text-gray-500">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                            <td class="text-xs text-gray-500">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                        </tr>
                        

                    <tbody>
                </table>

            </div>
      

        <!-- USER INFORMATION AREA -->

        
            <div class="row mt-30">
                <h3 class="pl-5 text-teal-900 title pt-30"> User Infromation </h3>

                <table>
                    <thead class="text-small">
                        <tr class="bg-gradient">
                            <th class="uppercase"></th>
                            <th class="text-white pl-5">FROM</th>
                            <th class="text-white pl-5">TO</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <!-- Data Row 1-->
                        <tr class="text-xs border-b pl-5">
                            <td class="text-10">VePOST Box</td>
                            <td class="text-xs">2334407454644765</td>
                            <td class="text-xs ">2334407454644766</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300 pl-5">
                            <td class="text-10">User Name</td>
                            <td class="text-xs">Majid</td>
                            <td class="text-xs">Sarfraz</td>
                        </tr>
                        <tr class="text-xs border-b pl-5">
                            <td class="text-10">Display Name</td>
                            <td class="text-xs">xxxx-xxxx-xxxx</td>
                            <td class="text-xs">xxxx-xxxx-xxxx</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300 pl-5">
                            <td class="text-10">Public IP</td>
                            <td class="text-xs">89.240.15.134</td>
                            <td class="text-xs ">192.168.30.31</td>
                        </tr>
                        <tr class="text-xs border-b pl-5">
                            <td class="text-10">Public Port</td>
                            <td class="text-xs">41946</td>
                            <td class="text-xs ">64130</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300 pl-5">
                            <td class="text-10">Private IP</td>
                            <td class="text-xs">192.168.30.20</td>
                            <td class="text-xs ">192.168.30.21</td>
                        </tr>
                        <tr class="text-xs border-b pl-5">
                            <td class="text-10">Private Port</td>
                            <td class="text-xs">40745</td>
                            <td class="text-xs ">53544</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300 pl-5">
                            <td class="text-10">OS</td>
                            <td class="text-xs">win32</td>
                            <td class="text-xs ">linux</td>
                        </tr>
                        <tr class="text-xs border-b pl-5">
                            <td class="text-10">OS Version</td>
                            <td class="text-xs">10.0.15063</td>
                            <td class="text-xs ">4.10.0-38-generic</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300 pl-5">
                            <td class="text-10">Mac Address</td>
                            <td class="text-xs">7c:e9:d3:2e:06:27</td>
                            <td class="text-xs ">7c:e9:d3:2e:05:85</td>
                        </tr>
                        <tr class="text-xs border-b pl-5">
                            <td class="text-10">OS Nmae</td>
                            <td class="text-xs">Mobile-Dev02</td>
                            <td class="text-xs ">linux-dev01</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300 pl-5">
                            <td class="text-10">Device User</td>
                            <td class="text-xs">xxxx-xxxx-xxxx</td>
                            <td class="text-xs ">xxxx-xxxx-xxxx</td>
                        </tr>
                    

                    

                    <tbody>
                </table>
            </div>
        
   </div>       
<!-- FOOTER -->
        <div class="">

            <footer>
            <hr style="width:100%">
            <p class="pull-left text-small ml-15 mtn-20" > Thank you for using VePOST - Encrypted, Fast, Reliabel ePackage transfer app available for Mac OSX, Windows, Linux.  </p>
            <p class="pull-right text-base font-bold text-teal-900 mr-30"> www.vepost.co.uk</p>
           </footer>
        </div>
 
</body>

</html>