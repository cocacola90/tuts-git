<div class="exemple">

    <!-- in this exemple, 12 is the average and 1 is the id of the line to update in DB -->
    <div class="basic" data-average="12" data-id="15"></div>
    <div id="box-message"></div>
    <div id="pop-message"></div>
    <div id="change_avg"></div>
    <!-- in this other exemple, 8 is the average and 2 is the id of the line to update in DB -->
    <div class="basic" data-average="8" data-id="16"></div>
    <div id="box-message"></div>
    <div id="pop-message"></div>
    <div id="change_avg"></div>

</div>
<style type="text/css">
    .datasSent, .serverResponse {
        margin-top: 20px;
        width: 470px;
        height: 73px;
        border: 1px solid #F0F0F0;
        background-color: #F8F8F8;
        padding: 10px;
        float: left;
        margin-right: 10px
    }

    .datasSent {
        width: 200px;
        position: fixed;
        left: 680px;
        top: 0
    }

    .serverResponse {
        position: fixed;
        left: 680px;
        top: 100px
    }

    .datasSent p, .serverResponse p {
        font-style: italic;
        font-size: 12px
    }

    .exemple {
        margin-top: 15px;
    }

    .clr {
        clear: both
    }

    pre {
        margin: 0;
        padding: 0
    }

    .notice {
        background-color: #F4F4F4;
        color: #666;
        border: 1px solid #CECECE;
        padding: 10px;
        font-weight: bold;
        width: 600px;
        font-size: 12px;
        margin-top: 10px
    }

    /*********************/
    /** jRating CSS **/
    /*********************/

    /**Div containing the color of the stars */
    .jRatingAverage {
        background-color: #f62929;
        position: relative;
        top: 0;
        left: 0;
        z-index: 2;
        height: 100%;
    }

    .jRatingColor {
        background-color: #f4c239; /* bgcolor of the stars*/
        position: relative;
        top: 0;
        left: 0;
        z-index: 2;
        height: 100%;
    }

    /** Div containing the stars **/
    .jStar {
        position: relative;
        left: 0;
        z-index: 3;
    }

    /** P containing the rate informations **/
    p.jRatingInfos {
        position: absolute;
        z-index: 9999;
        background: transparent url('/theme/Dx/img/bg_jRatingInfos.png') no-repeat;
        color: #FFF;
        display: none;
        width: 91px;
        height: 29px;
        font-size: 16px;
        text-align: center;
        padding-top: 5px;
    }

    p.jRatingInfos span.maxRate {
        color: #c9c9c9;
        font-size: 14px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        // simple jRating call
        $(".basic").jRating();

        // more complex jRating call
        $(".basic").jRating({
            step: true,
            length: 20, // nb of stars
            onSuccess: function () {
                alert('Success : your rate has been saved :)');
            }
        });

        // you can rate 3 times ! After, jRating will be disabled
        $(".basic").jRating({
            canRateAgain: true,
            nbRates: 3
        });

        // get the clicked rate !
        $(".basic").jRating({
            onClick: function (element, rate) {
                alert(rate);
            }
        });
    });
</script>
<!--






<div class='movie_choice'>
    Rate: Raiders of the Lost Ark
    <div id="r1" class="rate_widget">
        <div class="star_1 ratings_stars"></div>
        <div class="star_2 ratings_stars"></div>
        <div class="star_3 ratings_stars"></div>
        <div class="star_4 ratings_stars"></div>
        <div class="star_5 ratings_stars"></div>
        <div class="total_votes">vote data</div>
    </div>
</div>

<div class='movie_choice'>
    Rate: The Hunt for Red October
    <div id="r2" class="rate_widget">
        <div class="star_1 ratings_stars"></div>
        <div class="star_2 ratings_stars"></div>
        <div class="star_3 ratings_stars"></div>
        <div class="star_4 ratings_stars"></div>
        <div class="star_5 ratings_stars"></div>
        <div class="total_votes">vote data</div>
    </div>
</div>

<style type="text/css">

    .rate_widget {
        border:     1px solid #CCC;
        overflow:   visible;
        padding:    10px;
        position:   relative;
        width:      220px;
        height:     60px;
    }
    .ratings_stars {
        background: url('/theme/Dx/img/star_empty.png') no-repeat;
        float:      left;
        height:     28px;
        padding:    2px;
        width:      32px;
    }
    .ratings_vote {
        background: url('/theme/Dx/img/star_full.png') no-repeat;
    }
    .ratings_over {
        background: url('/theme/Dx/img/star_highlight.png') no-repeat;
    }
    .total_votes {
        background: #eaeaea;
        top: 58px;
        left: 0;
        padding: 5px;
        position:   absolute;
    }
    .movie_choice {
        font: 10px verdana, sans-serif;
        margin: 0 auto 40px auto;
        width: 180px;
    }
</style>
<script type="text/javascript">
    $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_over');
                $(this).nextAll().removeClass('ratings_vote');
            },
            // Handles the mouseout
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_over');
                set_votes($(this).parent());
            }
    );
    $('.rate_widget').each(function(i) {
        var widget = this;
        var out_data = {
            widget_id : $(widget).attr('id'),
            fetch: 1
        };
        $.post(
                'http://dx.vn/products/ratings',
                out_data,
                function(INFO) {
                    $(widget).data( 'fsr', INFO );
                    set_votes(widget);
                },
                'json'
        );
    });
    function set_votes(widget) {

        var avg = $(widget).data('fsr').whole_avg;

        var votes = $(widget).data('fsr').number_votes;
        var exact = $(widget).data('fsr').dec_avg;

        $(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratings_vote');
        $(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote');
        $(widget).find('.total_votes').text( votes + ' votes recorded (' + exact + ' rating)' );
    }
</script>-->
