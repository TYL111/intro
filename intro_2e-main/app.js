addEventListener('input' , get_cmd);

function get_cmd(input){
    cmd = input.target.value;
    result = document.querySelector('.result')
    if(cmd === "cd me"){
        result.innerHTML = `<p>C://TYL/me&ensp;>&emsp;TYL
                            </br>>> a senior high school student
                            </br>>> live in Yunlin County, Taiwan, Earth, Solar System
                            </br>>> learning to code since 2022(?)</p>`;
    }else if(cmd === 'cd learning'){
        result.innerHTML = `<p>C://TYL/learning/language&ensp;>&emsp;
                            </br>>> Chinese
                            </br>>> Taiwanese
                            </br>>> English
                            </br>>> German
                            </br>C://TYL/learning/code&ensp;>&emsp;
                            </br>>> front-end
                            </br>&emsp;&emsp;>> HTML
                            </br>&emsp;&emsp;>> CSS
                            </br>&emsp;&emsp;>> JavaScript
                            </br>>> Python</p>`
    }else if(cmd === 'cd games'){
        result.innerHTML = `<p>C://TYL/GAMES&ensp;>&emsp;
                            </br>>> APEX
                            </br>>> Minecraft
                            </br>>> popkart
                            </br>>> League Of Legends
                            </br>>> Oxygen Not Included
                            </br>>> Dying Light</p>`
    }else if(cmd === 'cd sports'){
        result.innerHTML = `<p>C://TYL/SPORTS&ensp;>&emsp;
                            </br>>> Badminton
                            </br>>> Basketball
                            </br>>> Volleyball</p>`
    }else if(cmd === 'cd ig'){
        result.innerHTML = `<p>C://TYL/IG&ensp;>&emsp;tyl_0623
                            </br>>>link：<a href="https://www.instagram.com/tyl_0623/">https://www.instagram.com/tyl_0623/</a></p>`
    }else if(cmd === 'cd dc'){
        result.innerHTML = `<p>C://TYL/DC&ensp;>&emsp;TYL / 阿綸ㄍㄨㄢ#6711
                            </br>>>link：<a href="https://discordapp.com/users/665536303424733204">https://discordapp.com/users/665536303424733204</a></p>`
    }else if(cmd === 'cd fb'){
        result.innerHTML = `<p>C://TYL/FB&ensp;>&emsp;Tseng Yen Lun
                            </br>>>link：<a href="https://www.facebook.com/profile.php?id=100017390148213">https://www.facebook.com/profile.php?id=100017390148213</a></p>`
    }else if(cmd === 'cd works'){
        result.innerHTML = `<p>C://TYL/WORKS&ensp;>&emsp;
                            </br>>> intro - <a href='https://ori.tseng.cf/'>https://ori.tseng.cf/</a>
                            </br>>> City CaCorn - <a href='https://cacorn.ncse.tw/'>https://cacorn.ncse.tw/</a>`
    }else{
        result.innerHTML = `<span>
                            C://TYL</br>
                            </br>
                            |</br>
                            |_ me</br>
                            |</br>
                            |__ learning</br>
                            |</br>
                            |___ games</br>
                            |</br>
                            |____ sports</br>
                            |</br>
                            |_____ works</br>
                            |</br>
                            |______ ig</br>
                            |</br>
                            |_______ dc</br>
                            |</br>
                            |________ fb
                            </span>`
    }
}