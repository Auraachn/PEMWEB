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
    $hobby = array('Writing', "Cooking", "Reviewing Game", 'Singing');
    $education = array('SDIT BIS Balikpapan', 'SMPIT Al-Auliya Balikpapan', 'SMPI Baitul Izzah Nganjuk', 'SMA Negeri 2 Nganjuk', 'UPN "Veteran" Jawa Timur');
    $experience = array('JPC (Japanese Club)', 'UKM Onigiri');
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
                                    <li>C</li>
                                    <li>C++</li>
                                    <li>Java</li>
                                    <li>HTML/CSS</li>
                                </ul></td></tr>
                                <tr><td style="font-size:15pt"><b>Hobby</b></td></tr>
                                <tr><td><ul>
                                    <li>Writing</li>
                                    <li>Cooking</li>
                                    <li>Reviewing Games</li>
                                    <li>Singing</li>
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
                                <td> 2009 - 2015</td><td rowspan="6" width="10px"></td>
                                <td><img src="points.png" style="width:20px"> &ensp; <?php echo $education[0];?></td></tr>
                                <tr><td> 2015 - 2016</td> 
                                <td><img src="points.png" style="width:20px"> &ensp; <?php echo $education[1];?></td></tr>
                                <tr><td> 2016 - 2018</td>
                                <td><img src="points.png" style="width:20px"> &ensp; <?php echo $education[2];?></td></tr>
                                <tr><td> 2018 - 2021</td>
                                <td><img src="points.png" style="width:20px"> &ensp; <?php echo $education[3];?></td></tr>
                                <tr><td> 2021 - currently</td>
                                <td><img src="points.png" style="width:20px"> &ensp; <?php echo $education[4];?></td></tr>
                                <tr><td></td><td style="color:rgb(239, 157, 165)"><img src="points.png" style="width:20px"> &ensp; <?php echo $jurusan;?></td></tr>
                                <td >&ensp;</td></tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr style="vertical-align :top">
                    <td align="center">
                        <div class="container3">
                            <table  align="center" width="400px">
                                <tr><td></td><td colspan="4" style="font-size:15pt"><h2><img src="portfolio.png" style="width:50px">&ensp;Experiences  </h2></td>
                                </tr><td rowspan="6" width="10px"></td>
                                <td> 2018 - 2021</td> <td rowspan="6" width="10px">
                                </td><td width="40px"><img src="points.png" style="width:20px"></td>
                                <td> <?php echo $experience[0];?> </td></tr>
                                <tr><td></td><td></td><td style="color:rgb(239, 157, 165)">Main Secretary</td></tr>
                                <tr><td> 2021 </td>
                                </td><td><img src="points.png" style="width:20px"></td>    
                                <td><?php echo $experience[1];?></td></tr>
                                <tr><td></td><td></td><td style="color:rgb(239, 157, 165)">New member</td></tr>
                                <tr><td> 2022 - currently</td>
                                </td><td><img src="points.png" style="width:20px"></td>
                                <td><?php echo $experience[1];?></td></tr>
                                <tr><td></td><td></td><td style="color:rgb(239, 157, 165)">Staff Member of the Language Division</td></tr>
                                <tr><td></td><td> 2022 - November</td>
                                <td></td><td><img src="points.png" style="width:20px"></td>
                                <td><?php echo $experience[1];?></td></tr>
                                <tr><td><td><td></td></td></td><td></td><td style="color:rgb(239, 157, 165)" valign="top">Member of the Security committee of "Diklat Onigiri" Event that lasted for 3 days straight </td></tr>
                                <td >&ensp;</td></tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr style="vertical-align :top">
                    <td align="center">
                        <div class="container4">
                            <table align="center" width="400px">
                                <tr><td colspan="4" style="font-size:15pt"><h3><img src="writing.png" style="width:30px">&ensp;Projects that I have done  </h3></td>
                                <tr><td><p align="justify"><img src="points.png" style="width:20px" >&ensp; Full on Analysis of a diabetes diseases data, and created a program to determine the type of diabetes based on the symptomps</p></td></tr>
                                <tr><td><p align="justify"><img src="points.png" style="width:20px" >&ensp; On a group project created a movie reviewing program that used 2 to 3 kind of data structure which is, linked list, queue and stack</td></td></td></tr>
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