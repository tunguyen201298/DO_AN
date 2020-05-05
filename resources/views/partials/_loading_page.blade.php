<style>
    #loading_page img {
        margin-left: 45%;
        margin-top: 20%;
        overflow: hidden;
        width: 80px;
    }
    #loading_page {
        background: #000 none repeat scroll 0 0;
        height: 100%;
        margin: auto 0;
        opacity: 0.5;
        position: fixed;
        width: 100%;
        z-index: 999999999999;
        display: none;
        top: 0;
    }
</style>
<div id="loading_page" >
    <img src="{{asset('public/img/loading_page.gif')}}" />
</div>