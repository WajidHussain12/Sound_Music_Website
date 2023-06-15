
const mediaQuery = window.matchMedia('(max-width: 768px)')
if (mediaQuery.matches) {
    var canvas = null;
}



function New2() {
    
    console.clear();
    
    var canvas = document.getElementById("imgVideo");
    const context = canvas.getContext("2d");

    canvas.width = 2100;
    canvas.height = 1000;

    const frameCount = 660;
    const currentFrame = index => (
        `Scroll sequence Frames/fbf-${index.toString().padStart(5, '0')}.jpg`

    );

    const images = []
    const video = {
        frame: 0
    };

    for (let i = 0; i < frameCount; i++) {
        const img = new Image();
        img.src = currentFrame(i);
        images.push(img);
    }

    let tl = gsap.timeline({
        scrollTrigger: {
            trigger: canvas,
            start: "top top",
            end: "bottom+=1000% top",
            scrub: 1,
            pin: true,
        }, onUpdate: render
    })

    tl.to(video, {
        frame: 660,
        snap: "frame",
        ease: "none",
        duration: 660,
    })
        .to(video, {
            frame: frameCount - 1,
            snap: "frame",
            ease: "none",
            duration: 2
        }, '+=1')

    images[0].onload = render;

    function render() {
        console.log(video.frame)
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.drawImage(images[video.frame], 0, 0);
    }
    
}
setTimeout(New2, 1000);





