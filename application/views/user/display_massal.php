<!DOCTYPE html>
<html>
<?php $display = 1; ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="refresh" content="<?php echo $rf ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Surya Sumatera | Status Produksi</title>

    <?php include('header.php'); ?>

    <style type="text/css">
        .testimonial-group > .row {
          overflow-x: auto;
          white-space: nowrap;
        }

        .testimonial-group > .row > .col-lg-1 {
          display: inline-block;
          float: none;
        }

        .pre-scrollable {
            max-height: 1900px;
            overflow-y: scroll;
        }

    </style>

    <style type="text/css">
    .found {
         background-color: yellow;   
    }
    </style>

    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/globalize/0.1.1/globalize.min.js"></script>

    <script type="text/javascript">
        function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
        console.log(t);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    </script>

    <script type="text/javascript">
        $(function(){   
        var content_id = "kanban";
        var content = '';
        
        $("#search_val").keydown(function(event){
            // on Enter
            if(event.keyCode == 13){
                // reset content 
                if(content != '') {
                    $("#"+content_id).html(content);
                } else {
                   content = $("#"+content_id).html(); 
                }
                intern_search($("#search_val").val());
            }
        })
        
        function intern_search(value) {
            // get the html text
            var html_content = $("#"+content_id).html();
            // split value into words
            var value_words = value.split(' ');
            var nr_words = value_words.length;
            
            // check if value is inside a html tag or not
            // if the first angle bracket is a '<' the value is outside of a html tag
            if (nr_words === 1) {
                var regex = new RegExp(value+'(?=[^>]*?(<|$))','gi');
            } else {
                // there can be a html tag between two words
                var regex = value_words[0]+'(?=[^>]*?(<|$))';
                for (var i = 1; i < nr_words; i++) {
                   // there can be a space and a whole html tag between two parts 
                   regex += '(?: ?)(?:<[^>]*?>)?(?: ?)'+value_words[i]+'(?=[^>]*?(<|$))';     
                }
                var regex = new RegExp(regex,'gi');
            }
            
            var matches = null;
            var positions = [], found = [], add_found_char = [];
            
            while(matches = regex.exec(html_content)) {
              // add this before / after a value part
              var start_tag = '<span class="found">';
              var end_tag = '</span>';
              // if the match contains html tags there need to be a </span>
              // before the html tag starts and a <span if the html tags closes again
               // abc <p>def => abc </span><p><span class="found">def</span>   
              var match = matches[0].replace(/>/g,'>'+start_tag);
              match = match.replace(/<(?!span class="found">)/g,end_tag+'<');
                
              // save the new match with correct html tags    
              found.push(match); 
              // save how many chars have been added 
              add_found_char.push(match.length-matches[0].length);
              // save found position
              positions.push(matches.index); 
            }
        
            
            var add_nr_chars = 0;
            var new_html_content = html_content;
            // iterate through all positions and add a span tag to mark the query
            for (var i = 0; i < positions.length; i++) {
                // add this before / after the found value
                var start_tag = '<span class="found" id="found_'+i+'">';
                var end_tag = '</span>';
                // string before value
                var content_before = new_html_content.substr(0,positions[i]+add_nr_chars);
                // value and start_tag and end_tag
                var value_and_tags = start_tag + found[i] + end_tag;
                // string after value
                var content_after = new_html_content.substr(positions[i]+add_nr_chars+found[i].length-add_found_char[i]);

                // number of characters which have been added
                add_nr_chars += start_tag.length + end_tag.length + add_found_char[i];
                
                // new content
                new_html_content = content_before + value_and_tags + content_after;
            }
            
            $("#"+content_id).html(new_html_content);                
        }
                                                                                   
                                                                                                  
    })
    </script>

</head>

<body onload="startTime()">
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <?php include('akunlogin.php') ?>
                <?php include('sidebar.php') ?>
            </ul>

        </div>
    </nav>



        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                </nav>
            </div>


            <div class="wrapper wrapper-content">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins animated fadeInRight">
                            <div class="ibox-title">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h2>Status Produksi</h2>
                                        <span class="pull-left"><b><?php echo date('d F Y - ')?></b><b><span id="txt"></span></b></span>
                                    </div>
                                    <div class="text-center col-lg-4">
                                        <h2>Kanban Massal / Produksi</h2>
                                    </div>
                                    <div class="col-lg-4 text-right form-group">
                                        <a class="btn btn-xs btn-danger" href="<?php echo base_url('user/display/massal/3600')?>">Stop Auto Refresh</a>
                                    </div>
                                    
                                </div>
                                

                                
                            </div>

                        </div>
                    </div>
                </div>

                <?php echo $this->session->flashdata('msg'); ?>

                <div  class="wrapper testimonial-group wrapper-content animated fadeInRight " >
                    <div id="kanban" class="row pre-scrollable">
                        

                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>PENJADWALAN <span class="label label-success pull-right"><?php  echo count($j)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="acc">   

                                        <?php for ($i=0; $i < count($j) ; ++$i) { ?>
                                           <?php include('card2/card-jadwal.php') ?>
                                        <?php } ?>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>SEPARASI <span class="label label-success pull-right"><?php  echo count($sp)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="desain">
                                     <?php for ($i=0; $i < count($sp) ; ++$i) { ?>
                                           <?php include('card2/card-separasi.php') ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>LILIN <span class="label label-success pull-right"><?php  echo count($li)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="desain">
                                     <?php for ($i=0; $i < count($li) ; ++$i) { ?>
                                           <?php include('card2/card-lilin.php') ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div> 

                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>GIPS<span class="label label-success pull-right"><?php  echo count($gi)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="gips">
                                        <?php for ($i=0; $i < count($gi) ; ++$i) { ?>
                                           <?php include('card2/card-gips.php') ?>
                                        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>COR<span class="label label-success pull-right"><?php  echo count($co)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="cor">

                                        <?php for ($i=0; $i < count($co) ; ++$i) { ?>
                                           <?php include('card2/card-cor.php') ?>

                                        <?php } ?>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>GOSOK PENTOL<span class="label label-success pull-right"><?php echo count($gp)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="gosok">
                                        <?php for ($i=0; $i < count($gp) ; ++$i) { ?>
                                           <?php include('card2/card-pentol.php') ?>
                                        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>GOSOK<span class="label label-success pull-right"><?php  echo count($go)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="gosok">
                                         <?php for ($i=0; $i < count($go) ; ++$i) { ?>
                                           <?php include('card2/card-gosok.php') ?>
                                        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>

                         <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>BOOM<span class="label label-success pull-right"><?php echo count($bo)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="boom">
                                       <?php for ($i=0; $i < count($bo) ; ++$i) { ?>
                                           <?php include('card2/card-boom.php') ?>
                                        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>

                        

                         <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>PASANG CZ<span class="label label-success pull-right"><?php  echo count($cz)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="cz">
                                        <?php for ($i=0; $i < count($cz) ; ++$i) { ?>
                                           <?php include('card2/card-cz.php') ?>
                                        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content"> 
                                    <h3>POLISH<span class="label label-success pull-right"><?php  echo count($po)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="poles">
                                        <?php for ($i=0; $i < count($po) ; ++$i) { ?>
                                           <?php include('card2/card-polish.php') ?>
                                        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>SLEB<span class="label label-success pull-right"><?php echo count($sl)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="chrome">
                                      <?php for ($i=0; $i < count($sl) ; ++$i) { ?>
                                           <?php include('card2/card-sleb.php') ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>KRUM<span class="label label-success pull-right"><?php echo count($kr)?></span></h3>
                                    
                                    <ul class="sortable-list connectList agile-list" id="chrome">
                                      <?php for ($i=0; $i < count($kr) ; ++$i) { ?>
                                           <?php include('card2/card-krum.php') ?>
                                        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>DONE<span class="label label-success pull-right"><?php echo count($do)?></span></h3>
                                    <p>SPK yang selesai proses produksi <br>
                                    dan menunggu dipindah ke gudang</p>
                                    <ul class="sortable-list connectList agile-list" id="done">
                                      <?php for ($i=0; $i < count($do) ; ++$i) { ?>
                                           <?php include('card2/card-done.php') ?>
                                        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>  
                        <div class="col-lg-1" style="vertical-align: top; top: 0%">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>FINANCE / SALES<span class="label label-success pull-right"><?php echo count($jd)?></span></h3>
                                    <p>Kumpulan dari PO Produk yang<br>
                                    menunggu diambil customer</p>
                                    <ul class="sortable-list connectList agile-list" id="done">
                                      <?php for ($i=0; $i < count($jd) ; ++$i) { ?>
                                           <?php include('card2/card-jadi.php') ?>
                                        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>

                        

                      

                    </div>

                </div>

                
                


            </div>


            <?php include('copyright.php') ?>

        </div>

    </div>

    <?php include('footer.php') ?>


    <script>
        $(document).ready(function(){

            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="row"><br><div class="col-lg-4"><input class="form-control" type="number" placeholder="berat" required name="berat[]"/></div><div class="col-lg-4"><input class="form-control" placeholder="jumlah" required type="number" name="jumlah[]"/></div><a href="#" class="btn btn-danger remove_field">Hapus</a></div>'); //add input box
                }
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })




            // $("#sales, #desain, #acc").sortable({
            //     connectWith: ".connectList",
            //     update: function( event, ui ) {

            //         var sales = $( "#sales" ).sortable( "toArray" );
            //         var desain = $( "#desain" ).sortable( "toArray" );

            //         $('.output').html("sales: " + window.JSON.stringify(sales) + "<br/>" + "desain: " + window.JSON.stringify(desain));

            //         //window.location = "http://localhost:8080/surya/" + sales[];


            //     }
            // }).disableSelection();

            $("#circularGaugeContainer").dxCircularGauge({
              rangeContainer: { 
                offset: 10,
                ranges: [
                  { startValue: 800, endValue: 1000, color: '#41A128' },
                  { startValue: 1000, endValue: 1500, color: '#2DD700' }
                ]
              },
              scale: {
                startValue: 0,  endValue: 1500,
                majorTick: { tickInterval: 250 },
                label: {
                  format: 'currency'
                }
              },
              title: {
                text: 'Sales MTD',
                subtitle: 'test',
                position: 'top-center'
              },
              tooltip: {
                    enabled: true,
                format: 'currency',
                    customizeText: function (arg) {
                        return 'Current ' + arg.valueText;
                    }
                },
              subvalueIndicator: {
                type: 'textCloud',
                format: 'thousands',
                text: {
                  format: 'currency',
                  customizeText: function (arg) {
                            return 'Goal ' + arg.valueText;
                  }
                }  
              },
              value: 900,
              subvalues: [825]
            });

        });


    </script>



</body>
</html>

