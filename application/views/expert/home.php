               <?php 
        $query = $this->common_model->normal_user($this->session->userdata('id'));
      if(!$query){
        $data= array(
            'id' =>$this->session->userdata('id'),
            'email' =>$this->session->userdata('email')
        );
        $this->common_model->insert($data, 'expert');
      }
               $IDE="Languages to learn 2020";
               $d1= "Python";
               $d2= "Java";
               $d3= "Javascript";
               $btn= "check it here";
               $title="Which programming Language should I learnt?";
               if($expert->language =="python" && $expert->is_okey == "Yes"){
                $IDE = $expert->language." IDEs";
               $d1= "Pycharm";
               $d2= "Anacoda";
               $d3= "VS Code";
               $btn= "More Languages";
               $title="Python my choice my favourite";
               ?>
                <div class="row">
                    <div class="col-lg-12 justine">
                        <div class="panel panel-default"> 
                            
                            <div class="panel-heading" style="background: wheat">
                                <h4 style="color: green;"><?php echo $title?>
                                <button class="btn btn-info pull pull-right"><a href="<?php echo base_url()?>/expert"><?php echo $btn;?></a></button>
                            </div>
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide3.jpg" alt="Owl Image">
                               <div class="text-block">
                                <h1><?php echo $IDE;?></h1>
                                <li><?php echo $d1;?></li>
                                  <li><?php echo $d2;?></li>
                                  <li><?php echo $d3;?></li>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                       <div class="col-md-6">
                        <div class="panel-group">
                       </div>
                 <div class="panel panel-default">
                     <div class="panel-body">
                        <h4 style="color: orange;">What excatly to python do?</h4>
                        <h2>Web Development</h2>
                  Web frameworks that are based on Python like Django and Flask have recently become very popular for web development.
                 <h2> Data Science.</h2> including machine learning, data analysis, and data visualization
                  <h2>Scripting</h2>
              What is scripting?
              Scripting usually refers to writing small programs that are designed to automate simple tasks.
                    </div>
                 </div>
                 </div>
               


                    
                      <div class="col-md-6">
                        <div class="collapse m-t-15" id="pgr2" aria-expanded="true"> <pre class="line-numbers language-javascript m-t-0"><code><b>
                            </code></pre> </div>
                        <div class="news-slide m-b-15">
                            <div class="vcarousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item">
                                        <div class="overlaybg"></div>
                                        <div class="news-content"><span class="label label-danger label-rounded">Primary</span>

                                            <h2>
                                            Python is used by Wikipedia, Google (where Van Rossum used to work), Yahoo!, CERN and NASA, among many other organisations. It's often used as a “scripting language” for web applications. This means that it can automate specific series.</h2> <a href="#">Read More</a></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
             ///////////Csharp page----------------/////////
          else   if($expert->language =="csharp" && $expert->is_okey == "Yes"){
                $IDE = $expert->language." IDEs";
               $d1= "Microsoft Visual Studio";
               $d2= "";
               $d3= "";
               $btn= "More Languages";
               $title="C# my choice my favourite!";
               ?>
                <div class="row">
                    <div class="col-lg-12 justine">
                        <div class="panel panel-default"> 
                            
                            <div class="panel-heading" style="background: wheat">
                                <h4 style="color: green;"><?php echo $title?>
                                <button class="btn btn-info pull pull-right"><a href="<?php echo base_url()?>/expert"><?php echo $btn;?></a></button>
                            </div>
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide3.jpg" alt="Owl Image">
                               <div class="text-block">
                                <h1><?php echo $IDE;?></h1>
                                <li><?php echo $d1;?></li>
                                  <li><?php echo $d2;?></li>
                                  <li><?php echo $d3;?></li>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                       <div class="col-md-6">
                        <div class="panel-group">
                       </div>
                 <div class="panel panel-default">
                     <div class="panel-body">
                        <h4 style="color: orange;">What are C Sharp uses?</h4>
                        
                 C# can be used to create almost anything but is particularly strong at building Windows desktop applications and games. C# can also be used to develop web applications and has become increasingly popular for mobile development too.
                    <h2>Language paradigms:</h2>
                     Object-oriented program...
                  <h2> Language designers:</h2>
                    Anders Hejlsberg, Micros...
                    </div>
                 </div>
                 </div>
               


                    
                      <div class="col-md-6">
                        <div class="collapse m-t-15" id="pgr2" aria-expanded="true"> <pre class="line-numbers language-javascript m-t-0"><code><b>
                            </code></pre> </div>
                        <div class="news-slide m-b-15">
                            <div class="vcarousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item">
                                        <div class="overlaybg"></div>
                                        <div class="news-content"><span class="label label-danger label-rounded">Primary</span>

                                            <h2>
                      C# is a much more powerful programming language than many of us may realize. Not only can you build traditional Windows Client applications and Web applications but you may also use C# to build mobile apps, Windows Store apps, and Enterprise applications. On top of that, C# is cool.
                                            .</h2> <a href="#">Read More</a></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            /////////////Java-----------------///////////////////
           else  if($expert->language =="java" && $expert->is_okey == "Yes"){
                $IDE = $expert->language." IDEs";
               $d1= "Netbeans";
               $d2= "Eclipse";
               $d3= "Vs code";
               $btn= "More Languages";
               $title="Java my choice my favourite!";
               ?>
                <div class="row">
                    <div class="col-lg-12 justine">
                        <div class="panel panel-default"> 
                            
                            <div class="panel-heading" style="background: wheat">
                                <h4 style="color: green;"><?php echo $title?>
                                <button class="btn btn-info pull pull-right"><a href="<?php echo base_url()?>/expert"><?php echo $btn;?></a></button>
                            </div>
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide3.jpg" alt="Owl Image">
                               <div class="text-block">
                                <h1><?php echo $IDE;?></h1>
                                <li><?php echo $d1;?></li>
                                  <li><?php echo $d2;?></li>
                                  <li><?php echo $d3;?></li>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                       <div class="col-md-6">
                        <div class="panel-group">
                       </div>
                 <div class="panel panel-default">
                     <div class="panel-body">
                        <h4 style="color: orange;">What Can Java Technology Do??</h4>
                        Development Tools: The development tools provide everything you'll need for compiling, running, monitoring, debugging, and documenting your applications.

                  Application Programming Interface (API): The API provides the core functionality of the Java programming language. It offers a wide array of useful classes ready for use in your own applications. 

                 Deployment Technologies: The JDK software provides standard mechanisms such as the Java Web Start software and Java Plug-In software for deploying your applications to end users.

                  User Interface Toolkits: The JavaFX, Swing, and Java 2D toolkits make it possible to create sophisticated Graphical User Interfaces (GUIs).

                Integration Libraries: Integration libraries such as the Java IDL API, JDBC API, Java Naming and Directory Interface (JNDI) API, Java RMI, and Java Remote Method Invocation over Internet Inter-ORB Protocol Technology (Java RMI-IIOP Technology) enable database access and manipulation of remote objects.
                        
               
                    </div>
                 </div>
                 </div>
               


                    
                      <div class="col-md-6">
                        <div class="collapse m-t-15" id="pgr2" aria-expanded="true"> <pre class="line-numbers language-javascript m-t-0"><code><b>
                            </code></pre> </div>
                        <div class="news-slide m-b-15">
                            <div class="vcarousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item">
                                        <div class="overlaybg"></div>
                                        <div class="news-content"><span class="label label-danger label-rounded">Primary</span>

                                            <h2>
                     Java is one of those languages that some may say is difficult to learn, while others think that it has the same learning curve as other languages. ... However, Java has a considerable upper hand over most languages because of its platform-independent nature
                                            .</h2> <a href="#">Read More</a></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            /////////javascrpt///////////////////
                         else if($expert->language =="javascript" && $expert->is_okey == "Yes"){
                $IDE = $expert->language." IDEs";
               $d1= "VS code";
               $d2= "Sublime text";
               $d3= "Notepad +++";
               $btn= "More Languages";
               $title="Javascript my choice my favourite!";
               ?>
                <div class="row">
                    <div class="col-lg-12 justine">
                        <div class="panel panel-default"> 
                            
                            <div class="panel-heading" style="background: wheat">
                                <h4 style="color: green;"><?php echo $title?>
                                <button class="btn btn-info pull pull-right"><a href="<?php echo base_url()?>/expert"><?php echo $btn;?></a></button>
                            </div>
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide3.jpg" alt="Owl Image">
                               <div class="text-block">
                                <h1><?php echo $IDE;?></h1>
                                <li><?php echo $d1;?></li>
                                  <li><?php echo $d2;?></li>
                                  <li><?php echo $d3;?></li>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                       <div class="col-md-6">
                        <div class="panel-group">
                       </div>
                 <div class="panel panel-default">
                     <div class="panel-body">
                        <h4 style="color: orange;">Top 3 javascript frameworks to learn in 2020?</h4>
                        <h4 class="text text-info">1. Angular JS</h4>
                        One of the most powerful, efficient, and open-source JavaScript frameworks is Angular. Google operates this framework and is implemented to use for developing a Single Page Application (SPA). It extends the HTML into the application and interprets the attributes to perform data binding.
                        <h4 class="text text-info">2. React</h4>
Created by Facebook, the React framework has earned popularity within a short period. It is used to develop and 
  <h4 class="text text-info">3. Vue JS</h4>
Though developed in the year 2016, this JavaScript framework has already made its way into the market and has proven its worth by offering various features.

                    </div>
                 </div>
                 </div>
               


                    
                      <div class="col-md-6">
                        <div class="collapse m-t-15" id="pgr2" aria-expanded="true"> <pre class="line-numbers language-javascript m-t-0"><code><b>
                            </code></pre> </div>
                        <div class="news-slide m-b-15">
                            <div class="vcarousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item">
                                        <div class="overlaybg"></div>
                                        <div class="news-content"><span class="label label-danger label-rounded">Primary</span>

                                            <h2>
                                                JavaScript is a client scripting language which is used for creating web pages. It is a standalone language developed in Netscape. It is used when a webpage is to be made dynamic and add special effects on pages like rollover, roll out and many types of graphics.
                                            .</h2> <a href="#">Read More</a></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            /////////////c+++////////////////
                        else if($expert->language =="cpp" && $expert->is_okey == "Yes"){
                $IDE = $expert->language." IDEs";
               $d1= "Falcon";
               $d2= "Code Blocks";
               $d3= "Dev C++";
               $btn= "More Languages";
               $title="C++ my choice my favourite!";
               ?>
                <div class="row">
                    <div class="col-lg-12 justine">
                        <div class="panel panel-default"> 
                            
                            <div class="panel-heading" style="background: wheat">
                                <h4 style="color: green;"><?php echo $title?>
                                <button class="btn btn-info pull pull-right"><a href="<?php echo base_url()?>/expert"><?php echo $btn;?></a></button>
                            </div>
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide3.jpg" alt="Owl Image">
                               <div class="text-block">
                                <h1><?php echo $IDE;?></h1>
                                <li><?php echo $d1;?></li>
                                  <li><?php echo $d2;?></li>
                                  <li><?php echo $d3;?></li>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                       <div class="col-md-6">
                        <div class="panel-group">
                       </div>
                 <div class="panel panel-default">
                     <div class="panel-body">
                        <h4 style="color: orange;">Applications of C++</h4>
Mainly C++ Language is used for Develop Desktop application and system software. Some application of C++ language are given below. ... Some of the Google applications are also written in C++, including Google file system and Google Chromium. C++ are used for design database like MySQL.
 <h4 style="color: orange;">Is C++ a technology?</h4>
With C++ being one of the most versatile languages in the world, some of its most popular uses include: systems programming, numerical and scientific computing, web development, writing compilers, console games, PC games and graphics, and desktop applications.
      <h4 style="color: orange;">Is C++ a written in C?</h4>
The C++ Standard library is written in C++ because most of its implementation uses templates. In a typical case, the C standard library is written primarily in C, and the C++ standard library primarily in C++
                    </div>
                 </div>
                 </div>
               


                    
                      <div class="col-md-6">
                        <div class="collapse m-t-15" id="pgr2" aria-expanded="true"> <pre class="line-numbers language-javascript m-t-0"><code><b>
                            </code></pre> </div>
                        <div class="news-slide m-b-15">
                            <div class="vcarousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item">
                                        <div class="overlaybg"></div>
                                        <div class="news-content"><span class="label label-danger label-rounded">Primary</span>

                                            <h2>
                     C++ allows procedural programming for intensive functions of CPU and to provide control over hardware, and this language is very fast because of which it is widely used in developing different games or in gaming engines. C++ mainly used in developing the suites of a game tool.
                                            .</h2> <a href="#">Read More</a></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ///////////default home page----------------/////////

              else{
               ?>
                <div class="row">
                    <div class="col-lg-12 justine">
                        <div class="panel panel-default"> 
                            
                            <div class="panel-heading" style="background: wheat">
                                <h4 style="color: green;"><?php echo $title?>
                                <button class="btn btn-info pull pull-right"><a href="<?php echo base_url()?>/expert"><?php echo $btn;?></a></button>
                            </div>
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide3.jpg" alt="Owl Image">
                               <div class="text-block">
                                <h1><?php echo $IDE;?></h1>
                                <li><?php echo $d1;?></li>
                                  <li><?php echo $d2;?></li>
                                  <li><?php echo $d3;?></li>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                       <div class="col-md-6">
                        <div class="panel-group">
                       </div>
                 <div class="panel panel-default">
                     <div class="panel-body">
                        <h4 style="color: orange;">Main Types of programming languages</h4>
                       <li> Procedural Programming Language.</li>
                 <li> Functional Programming Language.</li>
               <li>Object-oriented Programming Language.</li>
            <li> Scripting Programming Language.</li>
              <li> Logic Programming Language.</li>
              <h4 style="color: orange;">Does a computer programmer need a degree?</h4>
              “Most computer programmers have a bachelor's degree; however, some employers hire workers with an associate's degree,” according to the Bureau of Labor Statistics (BLS). ... But for many other tech jobs, a computer-science degree is a nice addition, not a necessity
                       
                    </div>
                 </div>
                 </div>
               


                    
                      <div class="col-md-6">
                        <div class="collapse m-t-15" id="pgr2" aria-expanded="true"> <pre class="line-numbers language-javascript m-t-0"><code><b>
                            </code></pre> </div>
                        <div class="news-slide m-b-15">
                            <div class="vcarousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item">
                                        <div class="overlaybg"></div>
                                        <div class="news-content"><span class="label label-danger label-rounded">Primary</span>

                                            <h2>
                                                The purpose of programming is to find a sequence of instructions that will automate the performance of a task (which can be as complex as an operating system) on a computer, often for solving a given problem.
                                          </h2> <a href="#">Read More</a></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
                     
                     <style>
                        .justine {
  position: relative;
}
                         .text-block {
  position: absolute;
  bottom: 150px;
  right: 500px;
  background-color: black;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
}
                     </style>