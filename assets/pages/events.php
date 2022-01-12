<link href="./index_files/fullcalendar.min.css" rel="stylesheet">
    <link href="./index_files/style1.css" rel="stylesheet" type="text/css">
    <!-- End CSS -->
                <div class="row">
                    <div class="col-12">                                 
                        <div class="row">
                             <div class="col-md-8 col-lg-9 col-xl-10">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div id="calendar" class="fc fc-unthemed fc-ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-2">
                                <div class="card m-b-30">
                                    <div class="card-header bg-white">
                                        <h5 class="card-title text-black mb-0">Created Events</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" id="add_event_form" class="m-t-5 m-b-20">
                                            <input type="text" class="form-control new-event-form" placeholder="Add new event...">
                                        </form>

                                        <div id="external-events">
                                            <h4 class="m-b-15 font-16">Draggable Events</h4>
                                            <div class="fc-event ui-draggable ui-draggable-handle" style="z-index: auto; width: 139.325px; inset: 0px auto auto 0px; height: 27.6px;">Birthday</div>
                                            <div class="fc-event ui-draggable ui-draggable-handle">Sports</div>
                                            <div class="fc-event ui-draggable ui-draggable-handle">Holiday</div>
                                            <div class="fc-event ui-draggable ui-draggable-handle">Break Time</div>
                                            <div class="fc-event ui-draggable ui-draggable-handle">Lunch</div>
                                        <div id="newy3zwc" class="fc-event ui-draggable ui-draggable-handle" style="z-index: auto; width: 139.325px; inset: 0px auto auto 0px; height: 27.6px;">مؤتمر</div></div>

                                        <!-- checkbox -->
                                        <div class="custom-control custom-checkbox mt-3">
                                            <input type="checkbox" class="custom-control-input" id="drop-remove" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                            <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                        </div>

                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->   

            <!-- End XP Contentbar -->

            <!-- Start XP Footerbar -->
            <div class="xp-footerbar">
                <footer class="footer">
                    <p class="mb-0">© 2020 Neon - All Rights Reserved.</p>
                </footer>
            </div>
            <!-- End XP Footerbar -->
    <!-- jQuery UI -->
    <script src="./index_files/jquery-ui.min.js"></script>
    <script src="./index_files/moment.js"></script>
    <script src="./index_files/fullcalendar.min.js"></script>
    <script src="./index_files/event-init.js"></script>
