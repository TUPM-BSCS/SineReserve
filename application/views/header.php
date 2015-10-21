<!DOCTYPE html>
<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
      
      <title>Home Page</title>

      <!-- CSS  -->
      <link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="<?php echo base_url();?>assets/css/new-moviebox-style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="<?php echo base_url();?>assets/css/gridlist.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="<?php echo base_url();?>assets/css/expand.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="<?php echo base_url();?>assets/css/slick.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="<?php echo base_url();?>assets/css/slick-theme.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="<?php echo base_url();?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="<?php echo base_url();?>assets/css/sticky.css" type="text/css" rel="stylesheet" media="screen,projection"/>

      <link href="<?php echo base_url();?>assets/css/lol.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  
  <body class="lighten-5" style="background-color: #18191b;">

    <!-- Navigation Bar -->
    <div class ="navbar-fixed">
      <nav class="red darken-4 main-nav ripple" id="meet-1" role="navigation">
        <div class="nav-wrapper container"> 
          <a id="logo-container" href= "<?php echo base_url();?>index.php/Home/home" class="brand-logo left-align white-text">SineReserve</a>
          <!--<a id="logo-container" href="http://localhost/SineReserve/index.php/Home/home" class="brand-logo left white-text hide-on-med-and-up">SineReserve</a>-->
<!--          <a href="#" data-activates="mobile-nav" class="right button-collapse"><i class="mdi-navigation-more-vert"></i></a>-->
          <ul class="right hide-on-large-only">
              <li><a href="<?php echo base_url();?>/index.php/movie_index_controller/movie_index"><i class="mdi-av-movie"></i></a></li>
              <li><a class="modal-trigger" data-target="modal1" href="<?php echo $accounts_link; ?>"><i class="mdi-action-account-circle"></i></a></li>
          </ul>
          <ul class="right hide-on-med-and-down">
                <!--<li><a href="http://localhost/SineReserve/index.php/movie_page_controller/movie">Movies</a></li>-->
                <li><a href="<?php echo base_url();?>/index.php/movie_index_controller/movie_index"><i class="mdi-av-movie left"></i>Movies</a></li>
                <li><a class="modal-trigger" data-target="modal1" href="<?php echo $accounts_link; ?>"><i class="mdi-action-account-circle left"></i><?php echo $accounts_label; ?></a></li>
                <li>
                  <div class="input-field red darken-2">
                      <input class="search" type="search" required></input>
                      <label for="search"><i class="mdi-action-search"></i></label>
                      <i class="mdi-navigation-close close"></i>
                  </div>  
                </li>
              </ul>
        </div>  
      </nav>
    </div>

    <div id="modal1" class="modal modal-fixed-footer accounts-overlay" style="width:30%">
        <div class="modal-content">
          <p>
            <div class="row">
              <ul class="collapsible" data-collapsible="accordion">
              <li>
                <div id="login-tab" class="collapsible-header active">
                  <h4>Login</h4>
                </div>
                <div class="collapsible-body">
                  <p>
                    <div class="row">
                     <?php echo validation_errors(); ?>
                     <?php echo form_open('login_validator'); ?>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="username_field" name="username" type="text" class="validate" />
                            <label for="username_field">Username</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="password_field" name="password" type="password" class="validate" />
                            <label for="password_field">Password</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s12">
                            <button class="waves-effect btn" type="submit" name="btn_sign-in">Sign In</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </p>
                </div>
              </li>
              <li>
                <div id="signup-tab" class="collapsible-header">
                  <h4>Sign-up</h4>
                </div>
                <div class="collapsible-body">
                  <div class="row">
                    <div class="input field col s12">
                      <input id="field_lname" type="text" class="validate" placeholder="Appleseed" />
                      <label for="field_lname">Last Name</label>
                    </div>
                    <div class="input field col s12">
                      <input id="field_fname" type="text" class="validate" placeholder="John" />
                      <label for="field_fname">First Name</label>
                    </div>
                    <div class="input field col s12">
                      <input id="field_mname" type="text" class="validate" placeholder="Marcos" />
                      <label for="field_mname">Middle Name</label>
                    </div>
                </div> 
              </li>
              </ul>
            </div>
          </p>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close btn-flat">Close</a>
        </div>
    </div>