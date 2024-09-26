<?php get_header(); ?>

<style>

    body {
        overflow: hidden;
    }

    div.step {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index: 3;
        position: relative;
    }

    h2 {
        color: #6a2d82;
        font-size: 2.5em !important;
    }

    p {
        color: white;
        text-align: center;
    }

    p a,
    .bilink {
        color: white;
        cursor: pointer;
    }

    p a {
        text-decoration: none;
    }

    p a:hover,
    .bilink:hover {
        text-decoration: underline;
    }

    .nota {
        background: black;
        padding: 40px 20px 10px;
        display: flex;
        justify-content: center;
        border-radius: 20px;
        align-items: center;
        flex-direction: column;
        position: relative;
        width: 80vw;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .nota img {
        border-radius: 100%;
        width: 40%;
    }

    .nota .txt-nota {
        color: white;
        background: #1a1f25;
        padding: 10px 20px;
        border-radius: 20px;
        position: absolute;
        top: 15px;
    }

    .question {
        width: 80vw;
        display: flex;
        background: black;
        padding: 20px;
        border-radius: 20px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        justify-content: space-between;
        flex-direction: column;
        align-items: center;
    }

    .question input {
        background: transparent;
        border: 0;
        border-bottom: 1px solid white;
        color: white;
        width: 100%;
        margin-bottom: 20px;
    }

    input:focus,
    input:focus-visible {
        outline-width: 0 !important;
        outline: none !important;
    }

</style>

<section class="base">
    <!-- <div class="bg-overlay opacity-95"></div> -->
    
    <div id="particles-js" 
        data-particles-number-value="180"
        data-particles-density-value="800"
        data-particles-shape-type="Circle"
        data-particles-color="#ffffff"
        data-particles-shape-stroke-color="#ffffff"
        data-particles-shape-stroke-width="1"
        data-particles-size-value="5"
        data-particles-size-random="true"
        data-particles-size-anim-enable="true"
        data-particles-size-anim-speed="40"
        data-particles-size-anim-size-min="0.1"
        data-particles-size-anim-sync="false"
        data-particles-opacity-value="0.5"
        data-particles-opacity-random="true"
        data-particles-opacity-anim-enable="true"
        data-particles-opacity-anim-speed="1"
        data-particles-opacity-anim-opacity-min="0.1"
        data-particles-opacity-anim-sync="false"
        data-particles-move-enabled="true"
        data-particles-move-direction="none"
        data-particles-move-random="true"
        data-particles-move-straight="false"
        data-particles-move-speed="6"
        data-particles-move-out-mode="out"
        data-particles-line-linked-enable-auto="false"
        data-particles-line-linked-distance="150"
        data-particles-line-linked-color="#002b54"
        data-particles-line-linked-opacity="0.40"
        data-particles-line-linked-width="1"
        data-particles-interactivity-onhover-enable="true"
        data-particles-interactivity-onhover-mode="repulse"
        data-particles-interactivity-modes-repulse-distance="212"
        data-particles-compatibility-customclass=".boomapps_vcrow, .vc_row, .wpb_row"
        data-particles-compatibility-zindex="2">
    </div>

    <div class="step" data-step="1">
        <h2>Ciao bi✨</h2>
        <p>Ci ho messo un po' ma ecco qua :)</p>
        <p><span class="bilink" onclick="goToStep(2)">Clicca qui <i class="fa-solid fa-chevron-right ms-2"></i></span></p>
    </div>

    <div class="step p-3" data-step="2" style="display:none">
        <p>Dovrai risolvere gli "indovinelli" per trovare la sorpresa finale</p>
        <p>P.S. Se chiudi la schermata devi ricominciare da capo 😽</p>
        <button class="btn btn-outline-light" onclick="goToStep(3)">Inizia</button>
    </div>

    <div class="step" data-step="3" style="display:none">
        <div class="nota">
            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/claudia.png' ?>">
            <span class="txt-nota">0:43</span>
        </div>

        <div class="question">
            <input placeholder="Scrivi qui..." type="text">
            <button class="btn btn-outline-light" onclick="goToStep(4)">Avanti</button>
        </div>
    </div> 
</section>

<?php get_footer(); ?>
