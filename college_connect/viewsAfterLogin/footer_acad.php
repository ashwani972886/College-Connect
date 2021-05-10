<script>

    $("#doc_acad_vis").hide();

    //To hide and unhide attachment input and manage time-table content

    $(document).ready(function() {

        $("#doc_acad").change(function() {

            $("#doc_acad_title_cal").hide();
            $("#doc_acad_title_ds").hide();
            $("#doc_acad_title_tt").hide();
            $("#doc_acad_title_syl").hide();
            $("#course_id").hide();
            $("#branch_id").hide();
            $("#sem_id").hide();
            $("#sec_id").hide();

            if($("#doc_acad").val() == ""){

                $("#doc_acad_vis").hide();
                $("#course_id").hide();
                $("#branch_id").hide();
                $("#sem_id").hide();
                $("#sec_id").hide();

            }  else if($("#doc_acad").val() == "doc"){

                $("#doc_acad_vis").hide();
                $("#course_id").hide();
                $("#branch_id").hide();
                $("#sem_id").hide();
                $("#sec_id").hide();

            } else if($("#doc_acad").val() == "ACAD_CAL"){

                $("#doc_acad_vis").show();
                $("#doc_acad_title_cal").show();
                $("#course_id").hide();
                $("#branch_id").hide();
                $("#sem_id").hide();
                $("#sec_id").hide();
                
                
            }  else if($("#doc_acad").val() == "DS"){

                $("#doc_acad_vis").show();
                $("#doc_acad_title_ds").show();
                $("#course_id").show();
                $("#branch_id").show();
                $("#sem_id").show();
                $("#sec_id").show();
                
                
            } else if($("#doc_acad").val() == "TT"){

                $("#doc_acad_vis").show();
                $("#doc_acad_title_tt").show();
                $("#course_id").show();
                $("#branch_id").show();
                $("#sem_id").show();
                $("#sec_id").show();

            } else if($("#doc_acad").val() == "Syl"){

                $("#doc_acad_vis").show();
                $("#doc_acad_title_syl").show();
                $("#course_id").show();
                $("#branch_id").show();
                $("#sem_id").show();
                $("#sec_id").show();

            }

        }).change();

    });

    // *************Date sheets************
    $(document).ready(function() {
        // bind change event handler
        $('#course_dt').change(function() {
            if($('#course_dt').val() == ""){

                $("#branch_dt_select2").hide();
                $("#sem_dt_2").hide();
            

            } else if($('#course_dt').val() == "B.Tech"){
                $("#branch_dt_select1").prop('disabled', this.value != "B.Tech").show();
                $("#sem_dt_2").hide();
                $("#sem_dt_1").show();
                
                $(document).ready(function() {
                    // bind change event handler
                    $('#branch_dt_select1').change(function() {
                        // update disabled property
                        $("#sem_dt_1").prop('disabled', this.value == "branch");
                        // trigger change event to set initial value
                    }).change();
                });
                
                $(document).ready(function() {
                    // bind change event handler
                    $('#sem_dt_1').change(function() {
                    // update disabled property
                        $("#sec_dt").prop('disabled', this.value == "semester");
                        // trigger change event to set initial value
                    }).change();
                });
            
            
            
                $("#branch_dt_select2").hide();

            } else{

                $("#branch_dt_select2").prop('disabled', this.value != "BBA").show();
                $("#sem_dt_1").hide();
                $("#sem_dt_2").show();
                
                $(document).ready(function() {
                    // bind change event handler
                    $('#branch_dt_select2').change(function() {
                    // update disabled property
                        $("#sem_dt_2").prop('disabled', this.value == "branch");
                        // trigger change event to set initial value
                    }).change();
                });
                
                
                $(document).ready(function() {
                    // bind change event handler
                    $('#sem_dt_2').change(function() {
                    // update disabled property
                        $("#sec_dt").prop('disabled', this.value == "semester");
                        // trigger change event to set initial value
                    }).change();
                });
                

                $("#branch_dt_select1").hide();
            
            }
        }).change();
    });

    //Time table
    $(document).ready(function() {
        // bind change event handler
        $('#course_tt').change(function() {
            if($('#course_tt').val() == ""){

                $("#branch_tt_select2").hide();
                $("#sem_tt_2").hide();
            

            } else if($('#course_tt').val() == "B.Tech"){
                $("#branch_tt_select1").prop('disabled', this.value != "B.Tech").show();
                $("#sem_tt_2").hide();
                $("#sem_tt_1").show();
                
                $(document).ready(function() {
                    // bind change event handler
                    $('#branch_tt_select1').change(function() {
                    // update disabled property
                        $("#sem_tt_1").prop('disabled', this.value == "branch");
                        // trigger change event to set initial value
                    }).change();
                });
                
                $(document).ready(function() {
                    // bind change event handler
                    $('#sem_tt_1').change(function() {
                    // update disabled property
                        $("#sec_tt").prop('disabled', this.value == "semester");
                        // trigger change event to set initial value
                    }).change();
                });
                
                $("#branch_tt_select2").hide();

            } else{

                $("#branch_tt_select2").prop('disabled', this.value != "BBA").show();
                $("#sem_tt_1").hide();
                $("#sem_tt_2").show();
                                
                $(document).ready(function() {
                    // bind change event handler
                    $('#branch_tt_select2').change(function() {
                    // update disabled property
                        $("#sem_tt_2").prop('disabled', this.value == "branch");
                        // trigger change event to set initial value
                    }).change();
                });
            
            
                $(document).ready(function() {
                    // bind change event handler
                    $('#sem_tt_2').change(function() {
                    // update disabled property
                        $("#sec_tt").prop('disabled', this.value == "semester");
                        // trigger change event to set initial value
                    }).change();
                });
            
            $("#branch_tt_select1").hide();
            
            }
        }).change();
    });

    //Syllabus
    $(document).ready(function() {
        // bind change event handler
        $('#course_syl').change(function() {
            if($('#course_syl').val() == ""){

                $("#branch_syl_select2").hide();
                $("#sem_syl_2").hide();                

            } else if($('#course_syl').val() == "B.Tech"){
                $("#branch_syl_select1").prop('disabled', this.value != "B.Tech").show();
                $("#sem_syl_2").hide();
                $("#sem_syl_1").show();
                
                $(document).ready(function() {
                    // bind change event handler
                    $('#branch_syl_select1').change(function() {
                    // update disabled property
                        $("#sem_syl_1").prop('disabled', this.value == "branch");
                        // trigger change event to set initial value
                    }).change();
                });
            
                $(document).ready(function() {
                    // bind change event handler
                    $('#sem_syl_1').change(function() {
                    // update disabled property
                        $("#sec_syl").prop('disabled', this.value == "semester");
                        // trigger change event to set initial value
                    }).change();
                });
                
                $("#branch_syl_select2").hide();

            } else{

                $("#branch_syl_select2").prop('disabled', this.value != "BBA").show();
                $("#sem_syl_1").hide();
                $("#sem_syl_2").show();

                $(document).ready(function() {
                    // bind change event handler
                    $('#branch_syl_select2').change(function() {
                    // update disabled property
                        $("#sem_syl_2").prop('disabled', this.value == "branch");
                        // trigger change event to set initial value
                    }).change();
                });
            
            
                $(document).ready(function() {
                    // bind change event handler
                    $('#sem_syl_2').change(function() {
                    // update disabled property
                        $("#sec_syl").prop('disabled', this.value == "semester");
                        // trigger change event to set initial value
                    }).change();
                });
                
                $("#branch_syl_select1").hide();
            
            }
        }).change();
    });

    // *************Academics New Material************
    $(document).ready(function() {
        // bind change event handler
        $('#course_acad').change(function() {
            if($('#course_acad').val() == ""){

                $("#branch_acad_select2").hide();
                $("#sem_acad_2").hide();
            

            } else if($('#course_acad').val() == "B.Tech"){
                $("#branch_acad_select1").prop('disabled', this.value != "B.Tech").show();
                $("#sem_acad_2").hide();
                $("#sem_acad_1").show();
                
                $(document).ready(function() {
                    // bind change event handler
                    $('#branch_acad_select1').change(function() {
                    // update disabled property
                        $("#sem_acad_1").prop('disabled', this.value == "branch");
                        // trigger change event to set initial value
                    }).change();
                });
            
                $(document).ready(function() {
                    // bind change event handler
                    $('#sem_acad_1').change(function() {
                    // update disabled property
                        $("#sec_acad").prop('disabled', this.value == "semester");
                        // trigger change event to set initial value
                    }).change();
                });
                
                $("#branch_acad_select2").hide();

            } else{

                $("#branch_acad_select2").prop('disabled', this.value != "BBA").show();
                $("#sem_acad_1").hide();
                $("#sem_acad_2").show();
                
                $(document).ready(function() {
                    // bind change event handler
                    $('#branch_acad_select2').change(function() {
                    // update disabled property
                        $("#sem_acad_2").prop('disabled', this.value == "branch");
                        // trigger change event to set initial value
                    }).change();
                });
            
            
                $(document).ready(function() {
                    // bind change event handler
                    $('#sem_acad_2').change(function() {
                    // update disabled property
                        $("#sec_acad").prop('disabled', this.value == "semester");
                        // trigger change event to set initial value
                    }).change();
                });

                 $("#branch_acad_select1").hide();
            
            }
            
        }).change();
    });
   
</script>