<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Support</title>
        <link href="/css/support.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" href="/media/image.ico" type="image/x-icon">
        <link rel="shortcut icon" href="media/image.ico" type="image/x-icon">
    </head>

    <body style="margin:0px 0px 0px 0px;">
        @include('nav')
        <div class="wrapper">
            <h1>FAQ</h1>

            <div class="support active">
                <button class="accordion">
                    Contact of Empyrean
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="pannel">
                    <a href="tel:043132244">04-313 2244</a>
                </div>
            </div>

            <div class="support">
                <button class="accordion">
                    Email of Empyrean
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="pannel">
                    <p><a href="mailto:someone@example.com">empyrean@gmail.com</a></p>
                </div>
            </div>

            <div class="support">
                <button class="accordion">
                    Why are some games available in other countries but I cannot play them?
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="pannel">
                    <p>Empyrean follows local content-rating agencies. We try to have all supported games available in all
                         countries, but some games are prohibited in some countries. Visit Game Library to see which titles are available.</p>
                </div>
            </div>

            <div class="support">
                <button class="accordion">
                    What are the minimum requirement, including internet speed to play Empyrean
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="pannel">
                    <p>Please visit <a href="srequirement"><b>System Requirements</b></a> for info on system requirements, including internet speed.</p>
                </div>
            </div>

            <div class="support">
                <button class="accordion">
                    Feedback
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="pannel">
                  <section class="Feedback">
                    <div text-align="center">
                        <form id="feedbackForm" name="feedbackForm" >
                            <table cellspacing="10" cellpadding="5">
                                <tr>
                                    <th colspan="5" if="feedfont">FEEDBACK FORM</th>
                                </tr>
                                <tr id="plesefill">
                                    <th colspan="5"><i>Please fill in your feedback</i></th>
                                </tr>
                                <tr>
                                    <th>Name:<span style="color:red">*</span></th>
                                    <td colspan="4">
                                        <input type="text" id="name" name="name" size="40" placeholder="First and last name" autofocus="autofocus" required="required"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td colspan="4">
                                        <input type="email" id="email" name="email" placeholder="example@example.com" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Contact No.:</th>
                                    <td colspan="4">
                                        <input type="tel" id="area" name="area" size="4" maxlength="3" placeholder="(nnn)" list="areaCode">
                                        <input type="tel" id="phone" name="phone" size="10" maxlength="8" placeholder="nnn-nnnn" pattern="[0-9]{8}">

                                        <datalist id="areacode">
                                            <option value="010">
                                            <option value="011">
                                            <option value="012">
                                            <option value="013">
                                            <option value="014">
                                            <option value="015">
                                            <option value="016">
                                            <option value="017">
                                            <option value="018">
                                            <option value="019">
                                        </datalist>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date:</th>
                                    <td colspan="4">
                                        <input type="date" id="today" name="today" />
                                        <input type="time" id="time" name="time" />
                                    </td>
                                </tr>
                                <tr></tr>

                                <tr>
                                    <th></th>
                                    <th style="text-align: center;">Highly Satisfied</th>
                                    <th style="text-align: center;">Satisfied</th>
                                    <th style="text-align: center;">Neither Satisfied nor Dissatisfied</th>
                                    <th style="text-align: center;">Dissatisfied</th>
                                    <th style="text-align: center;">Highly Dissatisfied</th>
                                </tr>
                                <tr>
                                    <th>Rate your overall satisfaction with your experience:</th>
                                <div class="ratio">
                                    <td style="width: 3%;text-align: center;"><input type="radio" name="feedback" id="feedback" value="Highly Satisfied"></td>
                                    <td style="width: 10%;text-align: center;"><input type="radio" name="feedback" id="feedback" value="Satisfied"></td>
                                    <td style="width: 10%;text-align: center;"><input type="radio" name="feedback" id="feedback" value="Neither Satisfied nor Dissatisfied"></td>
                                    <td style="width: 10%;text-align: center;"><input type="radio" name="feedback" id="feedback" value="Dissatisfied"></td>
                                    <td style="width: 10%;text-align: center;"><input type="radio" name="feedback" id="feedback" value="Highly Dissatisfied"></td>
                                </div>
                                </tr>
                                <tr>
                                    <th>Overall Experience:</th>
                                    <td colspan="4">
                                        <input type="range" id="overall" name="overall" min="0" max="10">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Any comments,questions or suggestions?</th>
                                    <td colspan="4">
                                        <textarea name="comments" id="comments" rows="5" cols="60" placeholder="Enter your comments here"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                       <input type="Reset" value="Reset Form">
                                    </td>
                                    <td colspan="4">
                                        <input type="submit" value="Submit">
                                        <input type="button" value="Cancel" onclick="confirm('Are you sure to cancel submission?')">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="file" name="submit" value="Submit">
                                        <br/>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                  </section>
                </div>
            </div>
        </div>

        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;
            for(i=0; i < acc.length ; i++){
                acc[i].addEventListener("click", function(){
                    this.classList.toggle("active");
                    this.parentElement.classList.toggle("active");

                    var pannel = this.nextElementSibling;

                    if(pannel.style.display === "block"){
                        pannel.style.display = "none";
                    }else{
                        pannel.style.display = "block";
                    }
            });
            }
        </script>

@include('footer')
    </body>
</html>