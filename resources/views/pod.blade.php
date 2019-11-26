@extends('layouts.app')
@section('content')
<a href="{{action('PodController@downloadPDF')}}">Download PDF
    <div class=" container mx-auto bg-white">


        <!-- TOP AREA OF POD -->
        <div class="mx-auto my-4  bg-gray-400 p-2 block pl-10 pr-10 pb-2 bg-top">
            <!-- DIV TOP-HEADER-ONE -->
            <div class="float-right flex flex-col leading-none">

                <div class="float-right mt-1 uppercase text-xs text-teal-900 font-semibold leading-none">Delivery Status
                    <div class="w-3 h-3 float-right    border-teal-500  bg-teal-500 ml-4 text-center border-4"></div>
                </div>
                <div class="float-right mt-1 uppercase text-xs text-teal-900 font-semibold leading-none ">Vewing Status
                    <div class="w-3 h-3 float-right  border-teal-500   ml-4 text-center border border-b-4"></div>
                </div>

                <!-- Second Option-->
                <!-- ------- --->


                <div class="float-right flex flex-col pt-1">
                    <div class=" bg-cover " style="background-image: url(./images/wave.svg);">
                        <div class="float-right mt-4 leading-none font-bold">
                            <h1 class="text-2xl uppercase text-teal-900"> PROOF OF<br>
                                <span class="text-2xl uppercase text-teal-900"> Delivery</span></h1>
                        </div>
                    </div>

                </div>


            </div>

            <!-- font image-->

            <div class="glyph fs1  pt-16">
                   
                    <i class="icon-vectorpaintvewvepost ve pod-logo-ve"></i>
		            <i class="icon-vectorpaintpstvepost pod-logo-post "></i>
               

            </div>



            <!-- DIV TOP-HEADER-TWO -->
            <div class="mt-2 pt-6 leading-none">

                <h1 class="uppercase  text-teal-500">subject</h1>
                <h1 class=" text-teal-900 text-2xl font-bold">Brand Project Files</h1>
                <br>
                <hr>

            </div>

            <!-- DIV TOP-HEADER-THREE -->

            <div class="flex  leading-none">
                <div class="w-2/5  p-2">
                    <div class="text-gray-700  inline-block p-2">
                        <div class=" text-teal-500  leading-none  uppercase">TO</div>
                        <div class=" text-teal-900 text-base font-bold">Jonathan</div>
                    </div>
                </div>
                <div class="w-2/6  inline-block p-2">
                    <div class="text-gray-700  p-2">
                        <div class="text-teal-500 leading-none uppercase ">Date</div>
                        <div class="text-teal-900 text-base font-bold">07-09-19</div>
                    </div>
                </div>
                <div class="w-2/6  inline-block p-2">
                    <div class="text-gray-700  p-2">
                        <div class="text-teal-500 leading-none uppercase">POST</div>
                        <div class="inline-block text-teal-900 text-base font-bold">Registered</div>
                    </div>
                </div>
            </div>
            <div class="flex   leading-none">
                <div class="w-2/5  p-2">
                    <div class="text-gray-700 inline-block p-2">
                        <div class="text-teal-500 leading-none uppercase">From</div>
                        <div class=" inline-block text-teal-800 text-base font-bold"> Majid H Khan </div>
                    </div>
                </div>
                <div class="w-2/6  inline-block p-2">
                    <div class="text-gray-700 p-2">
                        <div class="text-teal-500 leading-none uppercase">ID</div>
                        <div class="inline-block text-teal-900 text-base font-bold">15069-45755-826</div>
                    </div>
                </div>
                <div class="w-2/6  inline-block p-2">
                    <div class="text-gray-700 p-2">
                        <div class="text-teal-500 leading-none ">ePACKAGE</div>
                        <div class="inline-block text-teal-900 text-base uppercase font-bold">MULT</div>
                    </div>
                </div>
            </div>




        </div>


        <!-- ePACKAGE DETAILS AREA -->
        <div class="container mx-auto my-4  p-0 block pl-10 pr-10 pb-2 text-base">
            <div>
                <h1 class="text-teal-900 text-xl font-bold"> ePackage Details</h1>
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient ">
                            <th class="uppercase text-white text-xs lg:text-justify pl-2 py-1">Name</th>
                            <th class="uppercase text-white text-xs lg:text-justify pl-2 py-1">Size</th>
                            <th class="uppercase text-white  py-1"></th>
                            <th class="uppercase text-white text-xs lg:text-justify pl-2 py-1">Date / Time</th>
                            <th class="uppercase text-white  py-2">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-xs border-b">
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            <td class="bg-teal-100 text-teal-900 font-bold border-none lg:text-justify pl-2 ">Sent</td>
                            <td class="bg-teal-100 text-teal-900 font-bold border-none lg:text-justify pl-2">Received</td>
                            <td class="bg-teal-100 text-teal-900 font-bold border-none lg:text-justify pl-2">Opened</td>
                        </tr>
                        <!-- Data Row 1-->
                        <tr class="text-xs border-b">
                            <td class="border-none px-2 py-0 font-semibold">File name one version2.pdf</td>
                            <td class="border-none px-2 py-0">2.2 MB</td>
                            <td class="border-none px-2 py-0 ">
                                <p>GMT <span class="px-3">07-06-19 01:05:18<span> </p>
                                <p>Local <span class="px-2">07-06-19 01:05:18<span> </p>
                        </td>
                        <td class="border-none px-2 py-0">
                            <p>07-06-19 01:05:18 </p>
                            <p>07-06-19 01:05:18 </p>
                        </td>
                        <td class="border-none px-2 py-0">
                            <p>07-06-19 01:05:18 </p>
                            <p>07-06-19 01:05:18 </p>
                        </td>
                        </tr>
                        <!-- Data Row 2-->
                        <tr class="text-xs border-b bg-gray-300">
                            <td class="border-none px-2 py-0 font-semibold">File name one version2.pdf</td>
                            <td class="border-none px-2 py-0">2.2 MB</td>
                            <td class="border-none px-2 py-0 ">
                                <p>GMT <span class="px-3">07-06-19 01:05:18<span> </p>
                                <p>Local <span class="px-2">07-06-19 01:05:18<span> </p>

                            </td>
                            <td class="border-none px-2 py-0">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                            <td class="border-none px-2 py-0">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                        </tr>

                        <!-- Data Row 3 -->
                        <tr class="text-xs border-b ">
                            <td class="border-none px-2 py-0 font-semibold">File name one version2.pdf</td>
                            <td class="border-none px-2 py-0">2.2 MB</td>
                            <td class="border-none px-2 py-0 ">
                                <p>GMT <span class="px-3">07-06-19 01:05:18<span> </p>
                                <p>Local <span class="px-2">07-06-19 01:05:18<span> </p>

                            </td>
                            <td class="border-none px-2 py-0">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                            <td class="border-none px-2 py-0">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                        </tr>

                        <!-- Data Row 4-->
                        <tr class="text-xs border-b bg-gray-300">
                            <td class="border-none px-2 py-0 font-semibold">File name one version2.pdf</td>
                            <td class="border-none px-2 py-0">2.2 MB</td>
                            <td class="border-none px-2 py-0 ">
                                <p>GMT <span class="px-3">07-06-19 01:05:18<span> </p>
                                <p>Local <span class="px-2">07-06-19 01:05:18<span> </p>

                            </td>
                            <td class="border-none px-2 py-0">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                            <td class="border-none px-2 py-0">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                        </tr>


                        <!-- Deleted File Area -->
                        <tr class="text-xs border-b">
                            <td class="border-none"></td>
                            <td class="border-none"></td>
                            <td class="bg-gray-100 text-gray-500 font-bold border-none px-16 lg:text-justify pl-2">Sent</td>
                            <td class="bg-gray-100 text-gray-500 font-bold border-none px-4 lg:text-justify pl-2">Received</td>
                            <td class="bg-gray-100 text-gray-500 font-bold border-none px-4 lg:text-justify pl-2">Destroyed</td>
                        </tr>
                        <tr class="text-xs border-b">
                            <td class="border-none px-2 py-0 font-semibold text-gray-500">File name one version2.pdf</td>
                            <td class="border-none px-2 py-0 text-gray-500">2.2 MB</td>
                            <td class="border-none px-2 py-0 text-gray-500">
                                <p>GMT <span class="px-3">07-06-19 01:05:18<span> </p>
                                <p>Local <span class="px-2">07-06-19 01:05:18<span> </p>

                            </td>
                            <td class="border-none px-2 py-0 text-gray-500">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                            <td class="border-none px-2 py-0 text-gray-500">
                                <p>07-06-19 01:05:18 </p>
                                <p>07-06-19 01:05:18 </p>
                            </td>
                        </tr>

                    <tbody>
                </table>

            </div>
        </div>

        <!-- USER INFORMATION AREA -->

        <div class="container  mx-auto    p-0 block pl-10 pr-10 pb-2">
            <div class="text-xs">
                <h1 class="text-teal-900 text-xl font-bold"> User Infromation </h1>

                <table class="w-full text-xs">
                    <thead>
                        <tr class="bg-gradient">
                            <th class="uppercase text-white text-xs w-2/5 lg:text-justify pl-2 py-1"></th>
                            <th class="uppercase text-white text-xs w-1/5 lg:text-justify pl-2 py-1">FROM</th>
                            <th class="uppercase text-white text-xs w-1/5 lg:text-justify pl-2 py-1">TO</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <!-- Data Row 1-->
                        <tr class="text-xs border-b">
                            <td class="border-none px-2 py-0 font-semibold">VePOST Box</td>
                            <td class="border-none px-2 py-0">2334407454644765</td>
                            <td class="border-none px-2 py-0 ">2334407454644766</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300">
                            <td class="border-none px-2 py-0 font-semibold">User Name</td>
                            <td class="border-none px-2 py-0">Majid</td>
                            <td class="border-none px-2 py-0 ">Sarfraz</td>
                        </tr>
                        <tr class="text-xs border-b">
                            <td class="border-none px-2 py-0 font-semibold">Display Name</td>
                            <td class="border-none px-2 py-0">xxxx-xxxx-xxxx</td>
                            <td class="border-none px-2 py-0 ">xxxx-xxxx-xxxx</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300">
                            <td class="border-none px-2 py-0 font-semibold">Public IP</td>
                            <td class="border-none px-2 py-0">89.240.15.134</td>
                            <td class="border-none px-2 py-0 ">192.168.30.31</td>
                        </tr>
                        <tr class="text-xs border-b">
                            <td class="border-none px-2 py-0 font-semibold">Public Port</td>
                            <td class="border-none px-2 py-0">41946</td>
                            <td class="border-none px-2 py-0 ">64130</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300">
                            <td class="border-none px-2 py-0 font-semibold">Private IP</td>
                            <td class="border-none px-2 py-0">192.168.30.20</td>
                            <td class="border-none px-2 py-0 ">192.168.30.21</td>
                        </tr>
                        <tr class="text-xs border-b">
                            <td class="border-none px-2 py-0 font-semibold">Private Port</td>
                            <td class="border-none px-2 py-0">40745</td>
                            <td class="border-none px-2 py-0 ">53544</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300">
                            <td class="border-none px-2 py-0 font-semibold">OS</td>
                            <td class="border-none px-2 py-0">win32</td>
                            <td class="border-none px-2 py-0 ">linux</td>
                        </tr>
                        <tr class="text-xs border-b">
                            <td class="border-none px-2 py-0 font-semibold">OS Version</td>
                            <td class="border-none px-2 py-0">10.0.15063</td>
                            <td class="border-none px-2 py-0 ">4.10.0-38-generic</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300">
                            <td class="border-none px-2 py-0 font-semibold">Mac Address</td>
                            <td class="border-none px-2 py-0">7c:e9:d3:2e:06:27</td>
                            <td class="border-none px-2 py-0 ">7c:e9:d3:2e:05:85</td>
                        </tr>
                        <tr class="text-xs border-b">
                            <td class="border-none px-2 py-0 font-semibold">OS Name</td>
                            <td class="border-none px-2 py-0">Mobile-Dev02</td>
                            <td class="border-none px-2 py-0 ">linux-dev01</td>
                        </tr>
                        <tr class="text-xs border-b bg-gray-300">
                            <td class="border-none px-2 py-0 font-semibold">Device User</td>
                            <td class="border-none px-2 py-0">xxxx-xxxx-xxxx</td>
                            <td class="border-none px-2 py-0 ">xxxx-xxxx-xxxx</td>
                        </tr>
                    

                    

                        <tbody>
                </table>
            </div>
        </div>
        <!-- FOOTER -->
        <div class="container  mx-auto my-4   p-4 block pl-10 pr-10 pb-16">
            <hr>
            <p class="float-left text-small"> Thank you for using VePOST - Encrypted, Fast, Reliabel ePackage transfer app available for Mac OSX, Windows, Linux.  </p>
            <p class="float-right text-teal-800 text-xs font-bold"> www.vepost.co.uk</p>
           
        </div>
    </div>
@endsection