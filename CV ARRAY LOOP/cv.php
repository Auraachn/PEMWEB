<?php  
    $firstname = 'AURA';
    $lastname = 'CHOIRUN NISA';
    $lahir  = strtotime("2003-07-26");
    function umur($lahir){
        $Tanggal_lahir = date("Y-m-d", $lahir);
        $selisih = date_diff(date_create($Tanggal_lahir), date_create());
        echo $selisih->y;
    }
    $kota = 'Nganjuk';
    $provinsi = 'Jawa Timur';
    $nohp = '085695020051';
    $email = 'aurararanisa@gmail.com';
    $github = 'github.com/Auraachn';
    $linkedin = 'Auraachn26073';
    $instagram = 'instagram.com/auraachn._';
    $jurusan = 'Informatics Engineering';
    $bahasa = array('Bahasa Indonesia', "English", "Japanese");
    $skill = array('C', 'C++', 'Java', 'HTML/CSS', 'PHP');
    $hobby = array('Writing', "Cooking", "Reviewing Games", 'Singing', 'Voice Acting');
    $listofeducation = array(
        array('Date' => "2009 - 2015", 'Education' => "SDIT BIS Balikpapan"),
        array('Date' => "2015 - 2016", 'Education' => "SMPIT Al-Auliya Balikpapan"),
        array('Date' => "2016 - 2018", 'Education' => "SMPI Baitul Izzah Nganjuk"),
        array('Date' => "2018 - 2021", 'Education' => "SMA Negeri 2 Nganjuk"),
        array('Date' => "2021 - currently", 'Education' => "UPN 'Veteran' Jawa Timur")
    );
    $listofexperience = array(
        array('Date' => "2018 - 2021", 'Org' => "JPC (Japanese Club)", 'Position'=>"Main Secretary"),
        array('Date' => "2021", 'Org' => "UKM Onigiri", 'Position'=>"New Member"),
        array('Date' => "2022 - November", 'Org' => "UKM Onigiri", 'Position'=>"Member of the Security committee of 'Diklat Onigiri' Event that lasted for 3 days straight"),
        array('Date' => "2022 - Currently", 'Org' => "UKM Onigiri", 'Position'=>"	Staff Member and Assistant of the Language Division")
    );
    $projects = array("Full on Analysis of a diabetes diseases data, and created a program to determine the type of diabetes based on the symptomps",
                      "On a group project created a movie reviewing program that used 2 to 3 kind of data structure which is, linked list, queue and stack");
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </style>
    <link rel="stylesheet" href="cv_style.css?v=<?php echo time();?>">
    </style>
    </head>
    <body>
        &ensp;
        <div class="container1">
            <table >
                <tr style="vertical-align :top">
                    <td rowspan="5" align="center">
                        <div class="container">
                            <table width="90%" align="center">
                                <tr  align="center" width="1000px">
                                    <td align="center">
                                        <img src="pasfoto.jpg" style="width:200px; border-radius : 50%;">
                                    </td>
                                </tr>
                                <tr><td align="center" style="font-size: 16pt"><b><?php echo $firstname; ?></b></td></tr>
                                <tr><td align="center" style="font-size: 16pt"><b><?php echo $lastname; ?></b></td></tr>
                                <tr>
                                    <td align="center" style="color:rgb(239, 157, 165)"><?php echo $jurusan;?></td>
                                </tr>
                                <tr height="60px"><td>&ensp;</td></tr>
                                <tr><td> <img src="calendar.png" style="width:20px"> &ensp;<?php echo date("d-m-Y", $lahir) ?> (<?php echo umur($lahir) ;?> y.o.)</td></tr>
                                <tr><td> <img src="home.png" style="width:20px"> &ensp;<?php echo $kota;?>, <?php echo $provinsi;?></td></tr>
                                <tr><td> <img src="phone-call.png" style="width:20px"> &ensp;<?php echo $nohp;?></td></tr>
                                <tr><td> <img src="mail.png" style="width:20px"> &ensp;<?php echo $email;?></td></tr>
                                <tr><td> <a href="github.com/Auraach"> <img src="github.png" style="width:20px"> </a> &ensp;<?php echo $github;?></td></tr>
                                <tr><td> <a href="https://www.linkedin.com/in/Auraachn26073"> <img src="linkedin.png" style="width:20px"> </a> &ensp;<?php echo $linkedin;?></td></tr>
                                <tr><td> <a href="instagram.com/auraachn._"> <img src="instagram.png" style="width:20px"> </a> &ensp;<?php echo $instagram;?></td></tr>
                                <tr height="40px"><td>&ensp;</td></tr>
                                <tr><td style="font-size:15pt"><b>Language</b></td></tr>
                                <tr><td><dl>
                                    <dt><?php echo $bahasa[0];?><dd><div class="bars">
                                        <div class="skill indonesia" style="color : black "></div>
                                    </div></dd><dd>&ensp;</dd></dt>
                                    <dt><?php echo $bahasa[1];?><dd><div class="bars"><div class="skill english" style="color : black "></div>
                                    </div></dd><dd>&ensp;</dd></dt>
                                    <dt><?php echo $bahasa[2];?><dd><div class="bars"><div class="skill japanese" style="color : black "></div>
                                    </div></dd></dt>
                                </dl>
                                <tr><td style="font-size:15pt"><b>Skill</b></td></tr>
                                <tr><td><ul>
                                    <?php foreach($skill as $data):?>
                                    <li><?php echo $data ?> </li>
                                    <?php endforeach?>
                                </ul></td></tr>
                                <tr><td style="font-size:15pt"><b>Hobby</b></td></tr>
                                <tr><td><ul>
                                    <?php foreach($hobby as $data):?>
                                    <li><?php echo $data ?> </li>
                                    <?php endforeach?>
                                </ul></td></tr>
                        
                            </table>
                        </div>
                    </td>
                    <td rowspan="5">&ensp;</td>
                    <td align="center">
                        
                        <div class="container2">
                            <table align="center" width="400px">
                                <tr><td colspan="4" style="font-size:15pt"><h2><img src="college-graduation.png" style="width:50px">&ensp;Education  </h2></td>
                                </tr><td rowspan="6" width="10px"></td>
                                <?php foreach ($listofeducation as $data) :?>
                                <tr height="38">
                                    <td> <?php echo $data ['Date']?></td>
                                    <td><img src="points.png" style="width:20px"></td>
                                    <td>  <?php echo $data ['Education']?></td>
                                </tr>
                                <?php endforeach ?>
                                <tr><td>&ensp;</td><td>&ensp;</td><td><img src="points.png" style="width:20px"></td><td style="color:rgb(239, 157, 165)"> <?php echo $jurusan;?></td></tr>
                                <td >&ensp;</td></tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr style="vertical-align :top">
                    <td align="center">
                        <div class="container3">
                            <table  align="center" width="400p">
                                <tr><td></td><td colspan="5" style="font-size:15pt"><h2><img src="portfolio.png" style="width:50px">&ensp;Experiences  </h2></td>
                                <td></td></tr>
                                <?php foreach ($listofexperience as $data) :?>
                                <tr>
                                    <td width="20"></td>
                                    <td> <?php echo $data ['Date']?></td>
                                    <td> </td>
                                    <td width = "20"> <img src="points.png" style="width:20px"> </td>
                                    <td>  <?php echo $data ['Org']?></td>
                                </tr>
                                <tr><td></td><td></td><td></td><td></td><td style="color:rgb(239, 157, 165)"><?php echo $data ['Position']?></td></tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr style="vertical-align :top">
                    <td align="center">
                        <div class="container4">
                            <table align="center" width="400px">
                                <tr><td colspan="4" style="font-size:15pt"><h3><img src="writing.png" style="width:30px">&ensp;Projects that I have done  </h3></td>
                                <?php foreach ($projects as $data):?>
                                <tr>
                                    <td width = "30" ><img src="points.png" style="width:20px" ></td>
                                    <td ><p align="justify"><?php echo $data?> </p></td>
                                </tr>
                                <?php endforeach?>
                                 <tr><td>&ensp;</td></tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr><td height="50px">&ensp;</td></tr>
                
            </table>
        </div>
    &ensp;   
    </body>
    </html>