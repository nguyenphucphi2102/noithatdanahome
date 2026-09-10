<style>
	
        #scrollToTopBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 10%;
            padding: 15px;
            font-size: 18px;
            cursor: pointer;
            display: none;
            z-index: 1000;
        }

        #scrollToTopBtn:hover {
            background-color: #007bff;
        }

        #widget {
            position: fixed;
            right: 6px;
            z-index: 99;
            top: 60%;
            margin-top: -66px;
        }

        .callmeText {
            position: absolute;
            z-index: 0;
            top: 26px;
            padding-left: 50px;
            width: 170px;
            height: 39px;
            line-height: 43px;
            background-color: #fff;
            -webkit-border-radius: 45px;
            -moz-border-radius: 45px;
            border-radius: 45px;
            margin-left: 25px;
        }

        .callmeTextzalo {
            position: absolute;
            z-index: 0;
            top: 86px;
            padding-left: 57px;
            width: 204px;
            height: 50px;
            line-height: 50px;
            background-color: #fff;
            -webkit-border-radius: 45px;
            -moz-border-radius: 45px;
            border-radius: 45px;
            margin-left: 25px;
        }

        .phone_text {
            font-size: 16px;
            font-weight: bold;
            color: #cf0808;
        }

        #widget>a {
            display: block;
            text-align: center;
            border: 1px solid #0ea180;
            padding: 2px;
            border-radius: 50%;
            color: #FFF;
            font-size: 13px;
            background: #FFF;
            -webkit-box-shadow: 0 1px 5px #999;
            -moz-box-shadow: 0 1px 5px #999;
            box-shadow: 0 1px 5px #999;
            margin-bottom: 5px;
            height: 39px;
            width: 39px;
        }

        #widget>a:hover {
            display: block;
            text-align: center;
            border: 1px solid #f00;
            padding: 2px;
            border-radius: 50%;
            color: #FFF;
            font-size: 13px;
            background: #FFF;
            -webkit-box-shadow: 0 1px 5px #999;
            -moz-box-shadow: 0 1px 5px #999;
            box-shadow: 0 1px 5px #999;
            margin-bottom: 5px;
            height: 39px;
            width: 39px;
        }

        #widget>a [class*=fa] {
            background: #0ea180;
            display: block;
            line-height: 32px;
        }

        #widget>a [class*=fa],
        #widget>a img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        .suntory-alo-phone {
            background-color: transparent;
            cursor: pointer;
            height: 120px;
            position: fixed;
            transition: visibility 0.5s ease 0s;
            width: 120px;
            z-index: 200000 !important;
        }

        .suntory-alo-ph-circle {
            animation: 1.2s ease-in-out 0s normal none infinite running suntory-alo-circle-anim;
            background-color: transaparent;
            /*	border: 2px solid rgba(30, 30, 30, 0.4); */
            border-radius: 100%;
            height: 100px;
            left: 0px;
            opacity: 0.1;
            position: absolute;
            top: 0px;
            transform-origin: 50% 50% 0;
            transition: all 0.5s ease 0s;
            width: 100px;
        }

        .suntory-alo-ph-circle-fill {
            animation: 2.3s ease-in-out 0s normal none infinite running suntory-alo-circle-fill-anim;
            border: 2px solid transparent;
            border-radius: 100%;
            height: 60px;
            left: 15px;
            position: absolute;
            top: 15px;
            transform-origin: 50% 50% 0;
            transition: all 0.5s ease 0s;
            width: 60px;
        }

        .suntory-alo-ph-img-circle {
            /* animation: 1s ease-in-out 0s normal none infinite running suntory-alo-circle-img-anim; */
            border: 2px solid transparent;
            border-radius: 100%;
            height: 40px;
            left: 25px;
            opacity: 0.7;
            position: absolute;
            top: 25px;
            transform-origin: 50% 50% 0;
            width: 40px;
        }

        .suntory-alo-phone.suntory-alo-hover,
        .suntory-alo-phone:hover {
            opacity: 1;
        }

        .suntory-alo-phone.suntory-alo-active .suntory-alo-ph-circle {
            animation: 1.1s ease-in-out 0s normal none infinite running suntory-alo-circle-anim !important;
        }

        .suntory-alo-phone.suntory-alo-static .suntory-alo-ph-circle {
            animation: 2.2s ease-in-out 0s normal none infinite running suntory-alo-circle-anim !important;
        }

        .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-circle,
        .suntory-alo-phone:hover .suntory-alo-ph-circle {
            border-color: #00aff2;
            opacity: 0.5;
        }

        .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-circle,
        .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-circle {
            border-color: #EB278D;
            opacity: 1;
        }

        .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-circle {
            border-color: #bfebfc;
            opacity: 1;
        }

        .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-circle-fill,
        .suntory-alo-phone:hover .suntory-alo-ph-circle-fill {
            background-color: rgba(0, 175, 242, 0.9);
        }

        .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-circle-fill,
        .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-circle-fill {
            background-color: #EB278D;
        }

        .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-circle-fill {
            background-color: rgba(0, 175, 242, 0.9);
        }

        .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-img-circle,
        .suntory-alo-phone:hover .suntory-alo-ph-img-circle {
            background-color: #00aff2;
        }

        .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-img-circle,
        .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-img-circle {
            background-color: #EB278D;
        }

        .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-img-circle {
            background-color: #00aff2;
        }

        @keyframes suntory-alo-circle-anim {
            0% {
                opacity: 0.1;
                transform: rotate(0deg) scale(0.5) skew(1deg);
            }

            30% {
                opacity: 0.5;
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }

            100% {
                opacity: 0.6;
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }

        @keyframes suntory-alo-circle-img-anim {
            0% {
                transform: rotate(0deg) scale(1) skew(1deg);
            }

            10% {
                transform: rotate(-25deg) scale(1) skew(1deg);
            }

            20% {
                transform: rotate(25deg) scale(1) skew(1deg);
            }

            30% {
                transform: rotate(-25deg) scale(1) skew(1deg);
            }

            40% {
                transform: rotate(25deg) scale(1) skew(1deg);
            }

            50% {
                transform: rotate(0deg) scale(1) skew(1deg);
            }

            100% {
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }

        @keyframes suntory-alo-circle-fill-anim {
            0% {
                opacity: 0.2;
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }

            50% {
                opacity: 0.2;
                transform: rotate(0deg) scale(1) skew(1deg);
            }

            100% {
                opacity: 0.2;
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
        }

        .suntory-alo-ph-img-circle i {
            animation: 1s ease-in-out 0s normal none infinite running suntory-alo-circle-img-anim;
            font-size: 23px;
            line-height: 42px;
            padding-left: 7px;
            color: #fff;
        }

        /*=================== End phone ring ===============*/
        @keyframes suntory-alo-ring-ring {
            0% {
                transform: rotate(0deg) scale(1) skew(1deg);
            }

            10% {
                transform: rotate(-25deg) scale(1) skew(1deg);
            }

            20% {
                transform: rotate(25deg) scale(1) skew(1deg);
            }

            30% {
                transform: rotate(-25deg) scale(1) skew(1deg);
            }

            40% {
                transform: rotate(25deg) scale(1) skew(1deg);
            }

            50% {
                transform: rotate(0deg) scale(1) skew(1deg);
            }

            100% {
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }
		
		/* hiện khi scroll */

.progress-wrap {
    position: fixed;
    right: 15px;
    bottom: 75px;

    width: 50px;
    height: 50px;

    border: none;
    background: #fff;
    border-radius: 50%;

    cursor: pointer;
    z-index: 200001;

    display: flex;
    align-items: center;
    justify-content: center;

    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    pointer-events: auto;

    box-shadow: 0 8px 20px rgba(0,0,0,0.15);

    transition: all 0.3s ease;
}

/* hiện khi scroll */
.progress-wrap.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

/* svg */
.progress-circle {
    position: absolute;
    width: 100%;
    height: 100%;
}

.progress-circle path {
    fill: none;
    stroke: #c00;
    stroke-width: 4;
    stroke-linecap: round;
    transition: stroke-dashoffset 0.2s linear;
}

/* icon */
.progress-icon {
    font-size: 16px;
    color: #c00;
    font-weight: bold;
    z-index: 2;
}

/* hover */
.progress-wrap:hover {
    transform: translateY(0) scale(1.1);
}

@media (max-width: 576px) {
    .progress-wrap {
        right: 12px;
        bottom: 18px;
        width: 44px;
        height: 44px;
    }
}
    </style>


    <a href="https://zalo.me/0935911222" class="suntory-alo-phone suntory-alo-green" id="suntory-alo-phoneIcon" style="  left: 0px; bottom: 70px;">
        <div class="suntory-alo-ph-circle"></div>
        <div class="suntory-alo-ph-circle-fill"></div>
        <div class="suntory-alo-ph-img-circle"><img src="hinhmenu/icon-zalo.gif" style="width: 100%; height: auto;" />
        </div>
    </a>


    <a href="tel:0935911222" class="suntory-alo-phone suntory-alo-green" id="suntory-alo-phoneIcon"
        style="left: 0px; bottom: 0px;">
        <div class="callmeText">
            <span class="phone_text">0935 911 222</span>
        </div>
        <div class="suntory-alo-ph-circle"></div>
        <div class="suntory-alo-ph-circle-fill"></div>
        <div class="suntory-alo-ph-img-circle"><i class="fa fa-phone"></i></div>
    </a>


<button class="progress-wrap" aria-label="Scroll to top">

    <svg class="progress-circle" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>

    <span class="progress-icon">↑</span>

</button>

<script>
(function () {
    function initScrollTop() {
        const progressWrap = document.querySelector('.progress-wrap');
        const progressPath = document.querySelector('.progress-circle path');

        if (!progressWrap || !progressPath || progressWrap.dataset.ready === 'true') return;
        progressWrap.dataset.ready = 'true';

        const pathLength = progressPath.getTotalLength();
        progressPath.style.strokeDasharray = pathLength;
        progressPath.style.strokeDashoffset = pathLength;

        function updateProgress() {
            const scroll = window.pageYOffset || document.documentElement.scrollTop || 0;
            const height = Math.max(document.documentElement.scrollHeight - window.innerHeight, 1);
            progressPath.style.strokeDashoffset = pathLength - (scroll * pathLength / height);
            progressWrap.classList.toggle('active', scroll > 100);
        }

        window.addEventListener('scroll', updateProgress, { passive: true });
        progressWrap.addEventListener('click', function (event) {
            event.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        updateProgress();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initScrollTop);
    } else {
        initScrollTop();
    }
})();
</script>
