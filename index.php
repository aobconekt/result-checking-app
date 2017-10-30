<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="appcss/extcss.css">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-10 col-md-offset-1">
                <p class="header">Welcome to <b class="green">Greenfield</b> results portal</p>
            </div>
         </div>
         <div class="row">
           <div class="col-md-8 col-md-offset-3">
             
                <!--made by vipul mirajkar thevipulm.appspot.com-->
                  <h1>
                    <a href="" class="typewrite" data-period="2000" data-type='[ "Check your results within minutes", "by simply supplying your registration number", "and creating a login pin." ]'>
                      <span class="wrap"></span>
                    </a>
                  </h1>
           </div>
         </div>
         <div class="row">
             <div class="col-md-5">
                 <h3 class="green">Instructions for checking your results</h3>
                    <h4>Login with a valid Registration number and a valid pin to access the result page. Incase you don't have a valid pin, generate one by clicking the button under the login form and follow the instructions given.</h4>
                 <ul>Steps to generating your unique pin:
                    <li>Click on the button "Click to get your login pin", </li>
                    <li>Enter a valid registration number to generate your unique pin,</li>
                    <li>Copy your login pin and click on the "Return to login" link to return to the login page,</li>
                    <li>Carefully enter your registration number and the pin you've copied</li>
                    <li>Click on the "CHECK RESULT" button to access your result and ensure you logout before leaving the page.</li>
                 </ul>
                 <h3>Check below to find your registration Number to login</h3>
                    <ul id="reglist">
                      <li>2017001</li>
                      <li>2017002</li>
                      <li>2017003</li>
                    </ul>
             </div>

             <!--Login section-->
             <div class="col-md-5 col-md-offset-1">
                <h3>Input you details to check your results</h3>
                 <form class="form-vertical" method="post" action="result.php">
                    <input type="text" class="form-control input" name="regNo" placeholder="Registration Number">

                    <input type="password" name="pin" class="form-control input" placeholder="Enter your pin">


                    <button type="submit" class="btn btn-lg btn-info form-control input">CHECK RESULT</button>

                </form>

                <!--section for getting pin or updating your pin-->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="input">You don't have a pin? click to get yours.</h3>

                        <!--1st modal for creating new pin-->
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger btn-lg input" data-toggle="modal" data-target="#myModall">Click to get your login pin</button>

                        <!-- Modal -->
                        <div id="myModall" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Enter your registration Number</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-vertical" method="post" action="createpin.php">
                                    <input type="text" class="form-control input" name="regNo" placeholder="Registration Number">

                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-info">Get pin</button>
                                </form>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>

                        <!--2nd modal for updating pin-->

                    </div>
                </div>
             </div>
         </div>


    </div>

<script type="text/javascript">
  //made by vipul mirajkar thevipulm.appspot.com
var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };


</script>
<link type="text/javascript" href="myext_js/platform.js">
        <script type="text/javascript" src="js/jquery.js"></script>

        <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>