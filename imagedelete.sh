echo public/images/* | xargs -I{} sh -c 'if [ "{}" != "*noimage.jpg" ]; then echo "{}"; fi'
