<style>
    .signup-part {
        background-image: url('home-resourcess/img/Signup-cover.png');
        background-repeat: no-repeat;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center; /* Center vertically */
        align-items: center; /* Center horizontally */
        margin-top: 40px
    }

    .signup-part h2,
    .signup-part button, input {
        position: relative; /* Remove default margin */
        top: -50px;
    }

    .signup-part h2 {
        color: white;
        font-size: 40px;
    }

    .signup-part button {
        padding: 15px 40px 15px 40px;
        font-weight: bolder;
        margin-top: 15px;
        border: 1px solid;
        border-radius:10px;
        transition: background-color 0.5s ease;
        background-color: black;
        color: white;
        border: none;
        cursor: pointer;
    }

    .signup-part input { 
        display:block;
        height:50px;
        margin-top:15px;
        border:none;
        padding: 15px 40px 15px 40px;
        &::placeholder{
            -webkit-transform:translateY(0px);
            transform:translateY(0px);
            -webkit-transition:.5s;
            transition:.5s;
        }
        &:hover,
        &:focus,
        &:active:focus{
            color:#ff5722;
            outline:none;
            border-bottom:1px solid #ff5722;
            &::placeholder{
            color:#ff5722;
            position:relative;
            -webkit-transform:translateY(-20px);
            transform:translateY(-20px);
            
            }
        }
}
    
</style>
<div class="signup-part">
    <h2>Lets Book Together</h2>
    <input type="email" name="" id="" placeholder="Email">
    <button>SIGN UP</button>
</div>