@extends('frontend.index_master')
@section('frontend')
<section class="section other-page-sec">
    <div class="container">
        <div class="page-title">

            <button class="backBtn">Back</button>
            <script>
                document.querySelector('.backBtn').addEventListener('click', function () {
                    window.history.back();
                });
            </script>


            <div class="fullDetails">
                <div class="fullDetailsBox" style="height:fit-content">


                    <h2>Booking Details </h2>
                    <div class="short-line"></div>
                    <br><br>
                    <div class="fullDetailsgrid">

                        <div class="fullDetailsLeft">
                            <span class="status approved">Approved</span>
                            <!-- <span class="status pending">Pending</span>
                            <span class="status rejected">Rejected</span> -->
                            <br>
                            <br>
                            <br>
                            <p class="labal">Date</p>
                            <h4>10/08/2024</h4>

                            <p class="labal">Name</p>
                            <h4>Bishal Acharjee</h4>

                            <p class="labal">Organization Name</p>
                            <h4>ABC Organization</h4>

                            <p class="labal">Event Name</p>
                            <h4>Event Abcd Pqrs</h4>


                        </div>
                        <div class="fullDetailsRight">

                            <p class="labal">Url for webcasting</p>
                            <h4><a href="#">www.webcastinglink.com</a></h4>

                            <p class="labal">Auditorium</p>
                            <h4>ABC Auditorium</h4>

                            <p class="labal">Hall</p>
                            <h4>Hall C</h4>

                            <p class="labal">Slots</p>
                            <h4>10:00 - 14:00</h4>

                            <p class="labal">Service</p>
                            <h4><span>Service A</span>, <span>Service B</span></h4>
                        </div>
                    </div>
                    <img src="https://images.pexels.com/photos/976866/pexels-photo-976866.jpeg?auto=compress&cs=tinysrgb&w=600"
                        alt="" class="eventImage">

                </div>

                <div>
                    <div class="fullDetailsBox">
                        <h2>Url for webcasting</h2>
                        <div class="short-line"></div>
                        <br><br>
                        <form action="">
                            <div class="input-field">
                                <input name="" id="name" type="link" value="www.w3school.com" required>
                            </div>
                            <br>
                            <input class="submit" type="submit" name="submit" value="Add / Update">
                        </form>

                    </div>
                    <br>
                    <div class="fullDetailsBox">
                        <h2>Add Promotions</h2>
                        <div class="short-line"></div>
                        <br><br>

                        <div class="promotionsTab">
                            <button class="tablinks" onclick="openCity(event, 'Photo')" id="defaultOpen">Photo</button>
                            <button class="tablinks" onclick="openCity(event, 'YoutubeURL')">YoutubeURL</button>
                        </div>

                        <div id="Photo" class="tabcontent">
                            <form action="">
                                <div class="input-field">

                                    <label>Upload Photo (png/jpg/jpeg format)</label>
                                    <input name="" id="" type="file" required>
                                </div>
                                <br>
                                <input class="submit" type="submit" name="submit" value="Submit">
                            </form>

                        </div>

                        <div id="YoutubeURL" class="tabcontent">
                            <form action="">
                                <div class="input-field">

                                    <label>Youtube Video Url</label>
                                    <input name="" id="" type="link" required>
                                </div>
                                <br>
                                <input class="submit" type="submit" name="submit" value="Submit">
                            </form>
                        </div>



                        <!-- <form action="">
                            <div class="input-field">

                                <label>Youtube Video Url</label>
                                <input name="" id="name" type="link">
                            </div>
                            <div class="input-field">

                                <label>Youtube Video Url</label>
                                <input name="" id="name" type="link">
                            </div>
                            <br>
                            <input class="submit" type="submit" name="submit" value="Submit">
                        </form> -->

                    </div>
                    <br>
                    <div class="fullDetailsBox">
                        <h2>Your Promotions</h2>
                        <div class="short-line"></div>
                        <br><br>

                        <div class="myPromotion">
                            <span class="date">14/08/2024</span>
                            <a href="https://www.youtube.com/watch?v=dcadn-Wvwqo"
                                target="blank">https://www.youtube.com/watch?v=dcadn-Wvwqo</a>
                        </div>
                        <div class="myPromotion">
                            <span class="date">10/08/2024</span>
                            <a href="https://www.youtube.com/watch?v=dcadn-Wvwqo"
                                target="blank">https://www.youtube.com/watch?v=dcadn-Wvwqo</a>
                        </div>
                        <div class="myPromotion">
                            <span class="date">10/08/2024</span>
                            <img src="https://images.pexels.com/photos/919734/pexels-photo-919734.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="" class="eventImage">
                        </div>






                    </div>
                </div>
            </div>



        </div>

    </div>
</section>


<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>





@endsection