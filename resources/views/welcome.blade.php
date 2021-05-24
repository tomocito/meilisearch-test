<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>

        <div>
            <input type="text" id="search">
            <div id="results" style="margin-top:50px"></div>
        </div>

        <script src='https://cdn.jsdelivr.net/npm/meilisearch@latest/dist/bundles/meilisearch.umd.js'></script>
        <script>
            const client = new MeiliSearch({
                host: 'http://127.0.0.1:7700',
            })
            const index = client.index('users')

            const input = document.querySelector('#search')

            input.addEventListener('keyup', event => {
                index.search(event.target.value)
                .then(response => {
                        let nodes = response.hits.map(user => {
                            let div = document.createElement('div');
                            div.textContent = user.name;
                            return div;
                        });
                        let results = document.querySelector('#results');
                        results.innerHTML = '';
                        results.append(...nodes);
                    })
            })

        </script>
        
    </body>
</html>
