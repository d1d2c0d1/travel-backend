<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>U-GID API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .javascript-example code { display: none; }
            </style>


    <script src="{{ asset("vendor/scribe/js/theme-default-3.26.0.js") }}"></script>

</head>

<body data-languages="[&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-test">
                        <a href="#endpoints-GETapi-test">Testing route</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-items-filter">
                        <a href="#endpoints-POSTapi-items-filter">Getting list items</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-items-types">
                        <a href="#endpoints-GETapi-items-types">Getting all item types</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-items-categories">
                        <a href="#endpoints-GETapi-items-categories">Search categories</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-items-tags">
                        <a href="#endpoints-GETapi-items-tags">Search tags</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-items-properties">
                        <a href="#endpoints-GETapi-items-properties">Search properties</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-items--id-">
                        <a href="#endpoints-DELETEapi-items--id-">Remove item</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-items">
                        <a href="#endpoints-POSTapi-items">Create item</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-items--type---action---itemId---attachmentId-">
                        <a href="#endpoints-GETapi-items--type---action---itemId---attachmentId-">Detaching or attaching tag from item</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-PATCHapi-items--id-">
                        <a href="#endpoints-PATCHapi-items--id-">Item update</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-items-categories">
                        <a href="#endpoints-POSTapi-items-categories">Create item category</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-items-tags">
                        <a href="#endpoints-POSTapi-items-tags">Create tag</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-items-properties">
                        <a href="#endpoints-POSTapi-items-properties">Create property</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-posts-news-last">
                        <a href="#endpoints-GETapi-posts-news-last">Route for news</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-posts-news-single--slug-">
                        <a href="#endpoints-GETapi-posts-news-single--slug-">Route for getting single news</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-additional-weather">
                        <a href="#endpoints-GETapi-additional-weather">GET api/additional/weather</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-user-auth">
                        <a href="#endpoints-POSTapi-user-auth">Authenticate method</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-user-registration">
                        <a href="#endpoints-POSTapi-user-registration">Registration account</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user-data">
                        <a href="#endpoints-GETapi-user-data">GET api/user/data</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-user-filter">
                        <a href="#endpoints-POSTapi-user-filter">Getting list users</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-user-update--id-">
                        <a href="#endpoints-POSTapi-user-update--id-">Update user data</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user--id-">
                        <a href="#endpoints-GETapi-user--id-">Getting data about user by id</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-location-languages">
                        <a href="#endpoints-GETapi-location-languages">Route for get all languages</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-location-countries">
                        <a href="#endpoints-GETapi-location-countries">Route for getting countries array</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-location-regions--countryId--">
                        <a href="#endpoints-GETapi-location-regions--countryId--">Route for getting regions array</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-location-regions-search">
                        <a href="#endpoints-GETapi-location-regions-search">Search region by text name</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-location-cities">
                        <a href="#endpoints-GETapi-location-cities">Route for getting cities array</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-location-cities-search">
                        <a href="#endpoints-GETapi-location-cities-search">Search city by text name</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-location-areas">
                        <a href="#endpoints-GETapi-location-areas">Route for getting areas array</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-PUTapi-location-city--id-">
                        <a href="#endpoints-PUTapi-location-city--id-">Update city</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-location-city">
                        <a href="#endpoints-POSTapi-location-city">Create city</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-roles">
                        <a href="#endpoints-GETapi-roles">Getting list roles</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-subscribe">
                        <a href="#endpoints-POSTapi-subscribe">Display a listing of the resource.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-attachment-upload">
                        <a href="#endpoints-POSTapi-attachment-upload">File uploader</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-blog">
                        <a href="#endpoints-POSTapi-blog">Create row in database</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-PUTapi-blog--id-">
                        <a href="#endpoints-PUTapi-blog--id-">Update post data</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-blog--id-">
                        <a href="#endpoints-DELETEapi-blog--id-">Remove blog post</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-blog--position---id-">
                        <a href="#endpoints-POSTapi-blog--position---id-">Set position for post</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-blog-category">
                        <a href="#endpoints-POSTapi-blog-category">Create category for posts</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-blog-filter">
                        <a href="#endpoints-POSTapi-blog-filter">Getting posts by filter</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-blog-categories">
                        <a href="#endpoints-GETapi-blog-categories">Getting all categories</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-blog--id-">
                        <a href="#endpoints-GETapi-blog--id-">Getting single post</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-blog">
                        <a href="#endpoints-GETapi-blog">Getting all posts from blog</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: April 8 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Документация по работе с API для сервиса U-GID</p>
<p>Эта документация описывает основные методы разрешенные для использования в системе</p>
<aside>Некоторая часть документации может быть не описана. Со временем мы будем её дополнять. Спасибо за понимание!</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">https://u-gid.com</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-GETapi-test">Testing route</h2>

<p>
</p>



<span id="example-requests-GETapi-test">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/test"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-test">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;message&quot;: &quot;API is successfull working&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-test" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-test"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-test"></code></pre>
</span>
<span id="execution-error-GETapi-test" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-test"></code></pre>
</span>
<form id="form-GETapi-test" data-method="GET"
      data-path="api/test"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-test', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/test</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-items-filter">Getting list items</h2>

<p>
</p>



<span id="example-requests-POSTapi-items-filter">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/filter"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-items-filter">
</span>
<span id="execution-results-POSTapi-items-filter" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-items-filter"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-items-filter"></code></pre>
</span>
<span id="execution-error-POSTapi-items-filter" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-items-filter"></code></pre>
</span>
<form id="form-POSTapi-items-filter" data-method="POST"
      data-path="api/items/filter"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-items-filter', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/items/filter</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-items-types">Getting all item types</h2>

<p>
</p>



<span id="example-requests-GETapi-items-types">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/types"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-items-types">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Экскурсии&quot;,
            &quot;code&quot;: &quot;excursions&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Развлечения&quot;,
            &quot;code&quot;: &quot;entertainment&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Аренда авто&quot;,
            &quot;code&quot;: &quot;rent_a_car&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Аренда жилья&quot;,
            &quot;code&quot;: &quot;rent_a_house&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Пляж&quot;,
            &quot;code&quot;: &quot;beach&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Бары и рестораны&quot;,
            &quot;code&quot;: &quot;bars_and_restorants&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Парки и аттракционы&quot;,
            &quot;code&quot;: &quot;parks_and_attractions&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Достопримечательности&quot;,
            &quot;code&quot;: &quot;dostoprimechatelnosti&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Театры и цирки&quot;,
            &quot;code&quot;: &quot;theaters_and_circuses&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-items-types" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-items-types"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-items-types"></code></pre>
</span>
<span id="execution-error-GETapi-items-types" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-items-types"></code></pre>
</span>
<form id="form-GETapi-items-types" data-method="GET"
      data-path="api/items/types"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-items-types', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/items/types</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-items-categories">Search categories</h2>

<p>
</p>



<span id="example-requests-GETapi-items-categories">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-items-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 57
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 52,
            &quot;type_id&quot;: 2,
            &quot;name&quot;: &quot;Активный отдых&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-08 08:03:10&quot;,
            &quot;updated_at&quot;: &quot;2022-04-08 08:03:10&quot;
        },
        {
            &quot;id&quot;: 51,
            &quot;type_id&quot;: 2,
            &quot;name&quot;: &quot;Понравится детям&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-08 08:03:00&quot;,
            &quot;updated_at&quot;: &quot;2022-04-08 08:03:00&quot;
        },
        {
            &quot;id&quot;: 50,
            &quot;type_id&quot;: 2,
            &quot;name&quot;: &quot;аттракционы&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-08 08:02:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-08 08:02:52&quot;
        },
        {
            &quot;id&quot;: 49,
            &quot;type_id&quot;: 6,
            &quot;name&quot;: &quot;18+&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-07 13:33:01&quot;,
            &quot;updated_at&quot;: &quot;2022-04-07 13:33:01&quot;
        },
        {
            &quot;id&quot;: 48,
            &quot;type_id&quot;: 6,
            &quot;name&quot;: &quot;Ночное заведение&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-07 13:32:56&quot;,
            &quot;updated_at&quot;: &quot;2022-04-07 13:32:56&quot;
        },
        {
            &quot;id&quot;: 47,
            &quot;type_id&quot;: 6,
            &quot;name&quot;: &quot;Отдых с компанией&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-07 12:12:37&quot;,
            &quot;updated_at&quot;: &quot;2022-04-07 12:12:37&quot;
        },
        {
            &quot;id&quot;: 46,
            &quot;type_id&quot;: 6,
            &quot;name&quot;: &quot;Пивной бар&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-07 12:12:23&quot;,
            &quot;updated_at&quot;: &quot;2022-04-07 12:12:23&quot;
        },
        {
            &quot;id&quot;: 45,
            &quot;type_id&quot;: 8,
            &quot;name&quot;: &quot;Красивое место&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-07 08:53:45&quot;,
            &quot;updated_at&quot;: &quot;2022-04-07 08:53:45&quot;
        },
        {
            &quot;id&quot;: 44,
            &quot;type_id&quot;: 5,
            &quot;name&quot;: &quot;Узкий пляж&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-07 07:26:12&quot;,
            &quot;updated_at&quot;: &quot;2022-04-07 07:26:12&quot;
        },
        {
            &quot;id&quot;: 43,
            &quot;type_id&quot;: 5,
            &quot;name&quot;: &quot;Широкий пляж&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-07 07:26:06&quot;,
            &quot;updated_at&quot;: &quot;2022-04-07 07:26:06&quot;
        },
        {
            &quot;id&quot;: 42,
            &quot;type_id&quot;: 5,
            &quot;name&quot;: &quot;Закрытый пляж (для постояльцев)&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-07 07:25:58&quot;,
            &quot;updated_at&quot;: &quot;2022-04-07 07:25:58&quot;
        },
        {
            &quot;id&quot;: 41,
            &quot;type_id&quot;: 5,
            &quot;name&quot;: &quot;Дикий пляж&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-07 06:15:53&quot;,
            &quot;updated_at&quot;: &quot;2022-04-07 06:15:53&quot;
        },
        {
            &quot;id&quot;: 40,
            &quot;type_id&quot;: 5,
            &quot;name&quot;: &quot;Оборудованный&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-07 06:15:45&quot;,
            &quot;updated_at&quot;: &quot;2022-04-07 06:15:45&quot;
        },
        {
            &quot;id&quot;: 39,
            &quot;type_id&quot;: 8,
            &quot;name&quot;: &quot;Красивая природа&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 12:15:29&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 12:15:29&quot;
        },
        {
            &quot;id&quot;: 38,
            &quot;type_id&quot;: 5,
            &quot;name&quot;: &quot;Шезлонг&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 12:04:31&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 12:04:31&quot;
        },
        {
            &quot;id&quot;: 37,
            &quot;type_id&quot;: 2,
            &quot;name&quot;: &quot;Танцы&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 11:53:02&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 11:53:02&quot;
        },
        {
            &quot;id&quot;: 36,
            &quot;type_id&quot;: 6,
            &quot;name&quot;: &quot;Разнообразное меню&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 10:13:56&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 10:13:56&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;type_id&quot;: 6,
            &quot;name&quot;: &quot;Блюда на мангале&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 10:12:27&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 10:12:27&quot;
        },
        {
            &quot;id&quot;: 34,
            &quot;type_id&quot;: 6,
            &quot;name&quot;: &quot;Морепродукты&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 10:12:01&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 10:12:01&quot;
        },
        {
            &quot;id&quot;: 33,
            &quot;type_id&quot;: 8,
            &quot;name&quot;: &quot;Понравится детям&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 10:01:07&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 10:01:07&quot;
        },
        {
            &quot;id&quot;: 32,
            &quot;type_id&quot;: 8,
            &quot;name&quot;: &quot;Историческое место&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 09:57:11&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 09:57:11&quot;
        },
        {
            &quot;id&quot;: 31,
            &quot;type_id&quot;: 8,
            &quot;name&quot;: &quot;Здание&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 09:56:58&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 09:56:58&quot;
        },
        {
            &quot;id&quot;: 30,
            &quot;type_id&quot;: 8,
            &quot;name&quot;: &quot;Памятник&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 09:56:45&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 09:56:45&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;type_id&quot;: 8,
            &quot;name&quot;: &quot;Национальная кухня&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 09:42:54&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 09:42:54&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;type_id&quot;: 6,
            &quot;name&quot;: &quot;Национальная кухня&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 09:41:58&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 09:41:58&quot;
        },
        {
            &quot;id&quot;: 26,
            &quot;type_id&quot;: 6,
            &quot;name&quot;: &quot;семейный ресторан&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-06 08:59:53&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 08:59:53&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;type_id&quot;: 7,
            &quot;name&quot;: &quot;Вечерние прогулки&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-05 13:10:41&quot;,
            &quot;updated_at&quot;: &quot;2022-04-05 13:10:41&quot;
        },
        {
            &quot;id&quot;: 24,
            &quot;type_id&quot;: 7,
            &quot;name&quot;: &quot;Морские прогулки&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-05 13:08:48&quot;,
            &quot;updated_at&quot;: &quot;2022-04-05 13:08:48&quot;
        },
        {
            &quot;id&quot;: 23,
            &quot;type_id&quot;: 7,
            &quot;name&quot;: &quot;Аттракционы&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-04 07:11:12&quot;,
            &quot;updated_at&quot;: &quot;2022-04-04 07:11:12&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;type_id&quot;: 2,
            &quot;name&quot;: &quot;Экстримальный отдых&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-04 07:08:35&quot;,
            &quot;updated_at&quot;: &quot;2022-04-04 07:08:35&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;type_id&quot;: 7,
            &quot;name&quot;: &quot;Достопримечательность&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-04 06:42:57&quot;,
            &quot;updated_at&quot;: &quot;2022-04-04 06:42:57&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;type_id&quot;: 7,
            &quot;name&quot;: &quot;Парк&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-04 06:42:45&quot;,
            &quot;updated_at&quot;: &quot;2022-04-04 06:42:45&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;type_id&quot;: 7,
            &quot;name&quot;: &quot;Прогулка&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-04-04 06:42:38&quot;,
            &quot;updated_at&quot;: &quot;2022-04-04 06:42:38&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;type_id&quot;: 8,
            &quot;name&quot;: &quot;Достопримечательности&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-03-31 09:08:29&quot;,
            &quot;updated_at&quot;: &quot;2022-03-31 09:08:29&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;type_id&quot;: 1,
            &quot;name&quot;: &quot;U-GID рекомендует&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-03-30 13:54:43&quot;,
            &quot;updated_at&quot;: &quot;2022-03-30 13:54:43&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;type_id&quot;: 2,
            &quot;name&quot;: &quot;Достопримечательности&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-03-29 12:41:14&quot;,
            &quot;updated_at&quot;: &quot;2022-03-29 12:41:14&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;type_id&quot;: 2,
            &quot;name&quot;: &quot;Воздушные прогулки&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-03-25 14:57:43&quot;,
            &quot;updated_at&quot;: &quot;2022-03-25 14:57:43&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;type_id&quot;: 1,
            &quot;name&quot;: &quot;Воздушные прогулки&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-03-25 14:56:53&quot;,
            &quot;updated_at&quot;: &quot;2022-03-25 14:56:53&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;type_id&quot;: 2,
            &quot;name&quot;: &quot;Велосипедные прогулки&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-03-25 08:28:50&quot;,
            &quot;updated_at&quot;: &quot;2022-03-25 08:28:50&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;type_id&quot;: 1,
            &quot;name&quot;: &quot;Велосипедные прогулки&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-03-22 13:43:28&quot;,
            &quot;updated_at&quot;: &quot;2022-03-22 13:43:28&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;type_id&quot;: 1,
            &quot;name&quot;: &quot;Подводные прогулки&quot;,
            &quot;code&quot;: &quot;&quot;,
            &quot;description&quot;: &quot;&quot;,
            &quot;created_at&quot;: &quot;2022-03-22 13:42:21&quot;,
            &quot;updated_at&quot;: &quot;2022-03-22 13:42:21&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;type_id&quot;: 1,
            &quot;name&quot;: &quot;Пешие прогулки&quot;,
            &quot;code&quot;: &quot;peshie-progulki&quot;,
            &quot;description&quot;: &quot;Отличные пешие прогулки есть в нашем городе&quot;,
            &quot;created_at&quot;: &quot;2022-01-25 21:57:50&quot;,
            &quot;updated_at&quot;: &quot;2022-01-25 21:57:50&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;type_id&quot;: 1,
            &quot;name&quot;: &quot;Джип-Тур&quot;,
            &quot;code&quot;: &quot;djip-tur&quot;,
            &quot;description&quot;: &quot;Лучшие джип-туры которые имеются в регионе&quot;,
            &quot;created_at&quot;: &quot;2022-01-25 21:57:50&quot;,
            &quot;updated_at&quot;: &quot;2022-01-25 21:57:50&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-items-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-items-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-items-categories"></code></pre>
</span>
<span id="execution-error-GETapi-items-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-items-categories"></code></pre>
</span>
<form id="form-GETapi-items-categories" data-method="GET"
      data-path="api/items/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-items-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/items/categories</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-items-tags">Search tags</h2>

<p>
</p>



<span id="example-requests-GETapi-items-tags">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/tags"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-items-tags">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 56
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 37,
            &quot;title&quot;: &quot;Поездка&quot;,
            &quot;user_id&quot;: 7,
            &quot;created_at&quot;: &quot;2022-04-06 12:06:22&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 12:06:22&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;title&quot;: &quot;Прогулка&quot;,
            &quot;user_id&quot;: 9,
            &quot;created_at&quot;: &quot;2022-04-06 09:59:50&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 09:59:50&quot;
        },
        {
            &quot;id&quot;: 31,
            &quot;title&quot;: &quot;Санкт-Петербург&quot;,
            &quot;user_id&quot;: 9,
            &quot;created_at&quot;: &quot;2022-04-06 09:57:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 09:57:52&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;title&quot;: &quot;Сочи&quot;,
            &quot;user_id&quot;: 9,
            &quot;created_at&quot;: &quot;2022-04-06 09:57:38&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 09:57:38&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;title&quot;: &quot;тест3&quot;,
            &quot;user_id&quot;: 7,
            &quot;created_at&quot;: &quot;2022-04-05 13:10:11&quot;,
            &quot;updated_at&quot;: &quot;2022-04-05 13:10:11&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;title&quot;: &quot;аттракционы&quot;,
            &quot;user_id&quot;: 9,
            &quot;created_at&quot;: &quot;2022-04-05 12:43:58&quot;,
            &quot;updated_at&quot;: &quot;2022-04-05 12:43:58&quot;
        },
        {
            &quot;id&quot;: 24,
            &quot;title&quot;: &quot;отдых&quot;,
            &quot;user_id&quot;: 9,
            &quot;created_at&quot;: &quot;2022-04-04 07:09:09&quot;,
            &quot;updated_at&quot;: &quot;2022-04-04 07:09:09&quot;
        },
        {
            &quot;id&quot;: 23,
            &quot;title&quot;: &quot;парк&quot;,
            &quot;user_id&quot;: 9,
            &quot;created_at&quot;: &quot;2022-04-04 07:06:00&quot;,
            &quot;updated_at&quot;: &quot;2022-04-04 07:06:00&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;title&quot;: &quot;Москва&quot;,
            &quot;user_id&quot;: 9,
            &quot;created_at&quot;: &quot;2022-03-31 09:09:53&quot;,
            &quot;updated_at&quot;: &quot;2022-03-31 09:09:53&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;title&quot;: &quot;достопримечательности&quot;,
            &quot;user_id&quot;: 9,
            &quot;created_at&quot;: &quot;2022-03-29 12:42:47&quot;,
            &quot;updated_at&quot;: &quot;2022-03-29 12:42:47&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;title&quot;: &quot;Тест&quot;,
            &quot;user_id&quot;: 7,
            &quot;created_at&quot;: &quot;2022-03-25 14:48:33&quot;,
            &quot;updated_at&quot;: &quot;2022-03-25 14:48:33&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;title&quot;: &quot;позновательный&quot;,
            &quot;user_id&quot;: 7,
            &quot;created_at&quot;: &quot;2022-03-23 07:39:26&quot;,
            &quot;updated_at&quot;: &quot;2022-03-23 07:39:26&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;title&quot;: &quot;ресторан&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 03:08:59&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 03:08:59&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;title&quot;: &quot;бар&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 03:08:59&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 03:08:59&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: &quot;легкий&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 03:08:59&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 03:08:59&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: &quot;пляж&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 03:08:59&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 03:08:59&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: &quot;интересный&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 03:08:59&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 03:08:59&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: &quot;сложный&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 03:08:59&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 03:08:59&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: &quot;поход&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 03:08:59&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 03:08:59&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-items-tags" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-items-tags"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-items-tags"></code></pre>
</span>
<span id="execution-error-GETapi-items-tags" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-items-tags"></code></pre>
</span>
<form id="form-GETapi-items-tags" data-method="GET"
      data-path="api/items/tags"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-items-tags', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/items/tags</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-items-properties">Search properties</h2>

<p>
</p>



<span id="example-requests-GETapi-items-properties">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/properties"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-items-properties">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 55
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 55,
            &quot;name&quot;: &quot;Тип заведения&quot;,
            &quot;code&quot;: &quot;teatr_type&quot;,
            &quot;type_id&quot;: 9,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-08 19:56:46&quot;
        },
        {
            &quot;id&quot;: 54,
            &quot;name&quot;: &quot;Дресскод&quot;,
            &quot;code&quot;: &quot;teatr_dresscode&quot;,
            &quot;type_id&quot;: 9,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-08 19:56:46&quot;
        },
        {
            &quot;id&quot;: 53,
            &quot;name&quot;: &quot;Детское представление&quot;,
            &quot;code&quot;: &quot;teatr_for_childs&quot;,
            &quot;type_id&quot;: 9,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-08 19:56:46&quot;
        },
        {
            &quot;id&quot;: 52,
            &quot;name&quot;: &quot;Возрастное ограничение&quot;,
            &quot;code&quot;: &quot;teatr_age_limit&quot;,
            &quot;type_id&quot;: 9,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-08 19:56:46&quot;
        },
        {
            &quot;id&quot;: 51,
            &quot;name&quot;: &quot;Можно с детьми&quot;,
            &quot;code&quot;: &quot;teatr_with_childs&quot;,
            &quot;type_id&quot;: 9,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-08 19:56:46&quot;
        },
        {
            &quot;id&quot;: 50,
            &quot;name&quot;: &quot;Платный вход&quot;,
            &quot;code&quot;: &quot;dost_paid_inner&quot;,
            &quot;type_id&quot;: 8,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 18:03:42&quot;
        },
        {
            &quot;id&quot;: 49,
            &quot;name&quot;: &quot;Расположение&quot;,
            &quot;code&quot;: &quot;dost_placement&quot;,
            &quot;type_id&quot;: 8,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 18:03:42&quot;
        },
        {
            &quot;id&quot;: 48,
            &quot;name&quot;: &quot;Как добраться?&quot;,
            &quot;code&quot;: &quot;dost_how_to_go&quot;,
            &quot;type_id&quot;: 8,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 18:03:42&quot;
        },
        {
            &quot;id&quot;: 47,
            &quot;name&quot;: &quot;Зоны отдыха&quot;,
            &quot;code&quot;: &quot;dost_chillout_zone&quot;,
            &quot;type_id&quot;: 8,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 18:03:42&quot;
        },
        {
            &quot;id&quot;: 46,
            &quot;name&quot;: &quot;Доп. удобства&quot;,
            &quot;code&quot;: &quot;dost_additional_good&quot;,
            &quot;type_id&quot;: 8,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 18:03:42&quot;
        },
        {
            &quot;id&quot;: 45,
            &quot;name&quot;: &quot;Облагороженное место&quot;,
            &quot;code&quot;: &quot;park_good_place&quot;,
            &quot;type_id&quot;: 7,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 18:03:42&quot;
        },
        {
            &quot;id&quot;: 44,
            &quot;name&quot;: &quot;Платный вход&quot;,
            &quot;code&quot;: &quot;park_paid_inner&quot;,
            &quot;type_id&quot;: 7,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 18:03:42&quot;
        },
        {
            &quot;id&quot;: 43,
            &quot;name&quot;: &quot;Время работы&quot;,
            &quot;code&quot;: &quot;park_work_time&quot;,
            &quot;type_id&quot;: 7,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 18:03:42&quot;
        },
        {
            &quot;id&quot;: 42,
            &quot;name&quot;: &quot;Игровая зона&quot;,
            &quot;code&quot;: &quot;park_child_zone&quot;,
            &quot;type_id&quot;: 7,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 20:16:41&quot;
        },
        {
            &quot;id&quot;: 40,
            &quot;name&quot;: &quot;Водные аттракционы&quot;,
            &quot;code&quot;: &quot;beach_water_attractions&quot;,
            &quot;type_id&quot;: 5,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 39,
            &quot;name&quot;: &quot;Доп. удобства&quot;,
            &quot;code&quot;: &quot;beach_additional_chars&quot;,
            &quot;type_id&quot;: 5,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 18:05:53&quot;
        },
        {
            &quot;id&quot;: 38,
            &quot;name&quot;: &quot;Тип пляжа&quot;,
            &quot;code&quot;: &quot;beach_type&quot;,
            &quot;type_id&quot;: 5,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 37,
            &quot;name&quot;: &quot;Платный вход&quot;,
            &quot;code&quot;: &quot;beach_inner_paid&quot;,
            &quot;type_id&quot;: 5,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 34,
            &quot;name&quot;: &quot;Игровая зона&quot;,
            &quot;code&quot;: &quot;beach_child_zone&quot;,
            &quot;type_id&quot;: 5,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-06 18:05:28&quot;
        },
        {
            &quot;id&quot;: 33,
            &quot;name&quot;: &quot;Спортивные трансляции&quot;,
            &quot;code&quot;: &quot;rest_see_sport&quot;,
            &quot;type_id&quot;: 6,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 32,
            &quot;name&quot;: &quot;Наличие летней веранды&quot;,
            &quot;code&quot;: &quot;rest_summer_house&quot;,
            &quot;type_id&quot;: 6,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 31,
            &quot;name&quot;: &quot;Национальная кухня&quot;,
            &quot;code&quot;: &quot;rest_national_food&quot;,
            &quot;type_id&quot;: 6,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 30,
            &quot;name&quot;: &quot;Играовая комната&quot;,
            &quot;code&quot;: &quot;rest_play_room&quot;,
            &quot;type_id&quot;: 6,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;name&quot;: &quot;Тип заведения&quot;,
            &quot;code&quot;: &quot;rest_type&quot;,
            &quot;type_id&quot;: 6,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 26,
            &quot;name&quot;: &quot;Платный вход&quot;,
            &quot;code&quot;: &quot;entertainment_inner_paid&quot;,
            &quot;type_id&quot;: 2,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-05 20:30:44&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;name&quot;: &quot;Аттракционы&quot;,
            &quot;code&quot;: &quot;entertainment_attractions&quot;,
            &quot;type_id&quot;: 2,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-05 20:30:44&quot;
        },
        {
            &quot;id&quot;: 24,
            &quot;name&quot;: &quot;Наличие детской площадки (Игровой зоны)&quot;,
            &quot;code&quot;: &quot;entertainment_childzone&quot;,
            &quot;type_id&quot;: 2,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-04-05 20:30:44&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;name&quot;: &quot;Способ оплаты&quot;,
            &quot;code&quot;: &quot;rent_car_paid_type&quot;,
            &quot;type_id&quot;: 3,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;name&quot;: &quot;Класс авто&quot;,
            &quot;code&quot;: &quot;rent_car_class&quot;,
            &quot;type_id&quot;: 3,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;name&quot;: &quot;Способ оплаты&quot;,
            &quot;code&quot;: &quot;rent_house_paid_type&quot;,
            &quot;type_id&quot;: 4,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;name&quot;: &quot;Количество спальных мест&quot;,
            &quot;code&quot;: &quot;rent_house_sleep_places&quot;,
            &quot;type_id&quot;: 4,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;Статус жилья&quot;,
            &quot;code&quot;: &quot;rent_house_status&quot;,
            &quot;type_id&quot;: 4,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Ночное заведение&quot;,
            &quot;code&quot;: &quot;entertainment_night_work&quot;,
            &quot;type_id&quot;: 2,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;Запрещено людям младше 18 лет&quot;,
            &quot;code&quot;: &quot;entertainment_18_years_old&quot;,
            &quot;type_id&quot;: 2,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Время работы в выходные&quot;,
            &quot;code&quot;: &quot;entertainment_weekend_worktime&quot;,
            &quot;type_id&quot;: 2,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Есть бесплатные аттракционы&quot;,
            &quot;code&quot;: &quot;entertainment_free_attractions&quot;,
            &quot;type_id&quot;: 2,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Можно ли с детьми&quot;,
            &quot;code&quot;: &quot;entertainment_childs&quot;,
            &quot;type_id&quot;: 2,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Пешая экскурсия&quot;,
            &quot;code&quot;: &quot;excursion_walk&quot;,
            &quot;type_id&quot;: 1,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Способ оплаты&quot;,
            &quot;code&quot;: &quot;excursion_paid_type&quot;,
            &quot;type_id&quot;: 1,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Группа людей&quot;,
            &quot;code&quot;: &quot;excursion_group&quot;,
            &quot;type_id&quot;: 1,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Платная услуга&quot;,
            &quot;code&quot;: &quot;excursion_paid_services&quot;,
            &quot;type_id&quot;: 1,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Авто-экскурсия&quot;,
            &quot;code&quot;: &quot;excursion_auto&quot;,
            &quot;type_id&quot;: 1,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;С экскурсоводом&quot;,
            &quot;code&quot;: &quot;excursion_with_instructor&quot;,
            &quot;type_id&quot;: 1,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Можно с детьми&quot;,
            &quot;code&quot;: &quot;excursion_with_childs&quot;,
            &quot;type_id&quot;: 1,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Язык экскурсии&quot;,
            &quot;code&quot;: &quot;excursion_language&quot;,
            &quot;type_id&quot;: 1,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Длительность экскурсии&quot;,
            &quot;code&quot;: &quot;excursion_duration&quot;,
            &quot;type_id&quot;: 1,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Время работы экскурсии&quot;,
            &quot;code&quot;: &quot;excursion_work_time&quot;,
            &quot;type_id&quot;: 1,
            &quot;default&quot;: &quot;&quot;,
            &quot;user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-26 02:08:52&quot;,
            &quot;updated_at&quot;: &quot;2022-01-26 02:08:52&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-items-properties" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-items-properties"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-items-properties"></code></pre>
</span>
<span id="execution-error-GETapi-items-properties" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-items-properties"></code></pre>
</span>
<form id="form-GETapi-items-properties" data-method="GET"
      data-path="api/items/properties"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-items-properties', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/items/properties</code></b>
        </p>
                    </form>

            <h2 id="endpoints-DELETEapi-items--id-">Remove item</h2>

<p>
</p>



<span id="example-requests-DELETEapi-items--id-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/12"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-items--id-">
</span>
<span id="execution-results-DELETEapi-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-items--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-items--id-"></code></pre>
</span>
<form id="form-DELETEapi-items--id-" data-method="DELETE"
      data-path="api/items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/items/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-items--id-"
               value="12"
               data-component="url" hidden>
    <br>
<p>The ID of the item.</p>
            </p>
                    </form>

            <h2 id="endpoints-POSTapi-items">Create item</h2>

<p>
</p>



<span id="example-requests-POSTapi-items">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-items">
</span>
<span id="execution-results-POSTapi-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-items"></code></pre>
</span>
<span id="execution-error-POSTapi-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-items"></code></pre>
</span>
<form id="form-POSTapi-items" data-method="POST"
      data-path="api/items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/items</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-items--type---action---itemId---attachmentId-">Detaching or attaching tag from item</h2>

<p>
</p>



<span id="example-requests-GETapi-items--type---action---itemId---attachmentId-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/1/vel/illum/pariatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-items--type---action---itemId---attachmentId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 54
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: false,
    &quot;errors&quot;: [
        {
            &quot;message&quot;: &quot;Client authorization token can't be empty&quot;,
            &quot;code&quot;: 403
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-items--type---action---itemId---attachmentId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-items--type---action---itemId---attachmentId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-items--type---action---itemId---attachmentId-"></code></pre>
</span>
<span id="execution-error-GETapi-items--type---action---itemId---attachmentId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-items--type---action---itemId---attachmentId-"></code></pre>
</span>
<form id="form-GETapi-items--type---action---itemId---attachmentId-" data-method="GET"
      data-path="api/items/{type}/{action}/{itemId}/{attachmentId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-items--type---action---itemId---attachmentId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/items/{type}/{action}/{itemId}/{attachmentId}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>type</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="type"
               data-endpoint="GETapi-items--type---action---itemId---attachmentId-"
               value="1"
               data-component="url" hidden>
    <br>

            </p>
                    <p>
                <b><code>action</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="action"
               data-endpoint="GETapi-items--type---action---itemId---attachmentId-"
               value="vel"
               data-component="url" hidden>
    <br>

            </p>
                    <p>
                <b><code>itemId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="itemId"
               data-endpoint="GETapi-items--type---action---itemId---attachmentId-"
               value="illum"
               data-component="url" hidden>
    <br>

            </p>
                    <p>
                <b><code>attachmentId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="attachmentId"
               data-endpoint="GETapi-items--type---action---itemId---attachmentId-"
               value="pariatur"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

            <h2 id="endpoints-PATCHapi-items--id-">Item update</h2>

<p>
</p>



<span id="example-requests-PATCHapi-items--id-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/20"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-items--id-">
</span>
<span id="execution-results-PATCHapi-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-items--id-"></code></pre>
</span>
<span id="execution-error-PATCHapi-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-items--id-"></code></pre>
</span>
<form id="form-PATCHapi-items--id-" data-method="PATCH"
      data-path="api/items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/items/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PATCHapi-items--id-"
               value="20"
               data-component="url" hidden>
    <br>
<p>The ID of the item.</p>
            </p>
                    </form>

            <h2 id="endpoints-POSTapi-items-categories">Create item category</h2>

<p>
</p>



<span id="example-requests-POSTapi-items-categories">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-items-categories">
</span>
<span id="execution-results-POSTapi-items-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-items-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-items-categories"></code></pre>
</span>
<span id="execution-error-POSTapi-items-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-items-categories"></code></pre>
</span>
<form id="form-POSTapi-items-categories" data-method="POST"
      data-path="api/items/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-items-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/items/categories</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-items-tags">Create tag</h2>

<p>
</p>



<span id="example-requests-POSTapi-items-tags">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/tags"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-items-tags">
</span>
<span id="execution-results-POSTapi-items-tags" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-items-tags"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-items-tags"></code></pre>
</span>
<span id="execution-error-POSTapi-items-tags" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-items-tags"></code></pre>
</span>
<form id="form-POSTapi-items-tags" data-method="POST"
      data-path="api/items/tags"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-items-tags', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/items/tags</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-items-properties">Create property</h2>

<p>
</p>



<span id="example-requests-POSTapi-items-properties">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/items/properties"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-items-properties">
</span>
<span id="execution-results-POSTapi-items-properties" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-items-properties"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-items-properties"></code></pre>
</span>
<span id="execution-error-POSTapi-items-properties" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-items-properties"></code></pre>
</span>
<form id="form-POSTapi-items-properties" data-method="POST"
      data-path="api/items/properties"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-items-properties', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/items/properties</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-posts-news-last">Route for news</h2>

<p>
</p>



<span id="example-requests-GETapi-posts-news-last">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/posts/news/last"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-posts-news-last">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 53
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: false,
    &quot;error&quot;: &quot;News is empty&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-posts-news-last" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-posts-news-last"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts-news-last"></code></pre>
</span>
<span id="execution-error-GETapi-posts-news-last" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts-news-last"></code></pre>
</span>
<form id="form-GETapi-posts-news-last" data-method="GET"
      data-path="api/posts/news/last"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-posts-news-last', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/posts/news/last</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-posts-news-single--slug-">Route for getting single news</h2>

<p>
</p>



<span id="example-requests-GETapi-posts-news-single--slug-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/posts/news/single/sunt"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-posts-news-single--slug-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 52
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: false,
    &quot;error&quot;: &quot;Slug not found&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-posts-news-single--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-posts-news-single--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts-news-single--slug-"></code></pre>
</span>
<span id="execution-error-GETapi-posts-news-single--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts-news-single--slug-"></code></pre>
</span>
<form id="form-GETapi-posts-news-single--slug-" data-method="GET"
      data-path="api/posts/news/single/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-posts-news-single--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/posts/news/single/{slug}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>slug</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="slug"
               data-endpoint="GETapi-posts-news-single--slug-"
               value="sunt"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

            <h2 id="endpoints-GETapi-additional-weather">GET api/additional/weather</h2>

<p>
</p>



<span id="example-requests-GETapi-additional-weather">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/additional/weather"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-additional-weather">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 51
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Attempt to read property \&quot;temp_c\&quot; on null&quot;,
    &quot;exception&quot;: &quot;ErrorException&quot;,
    &quot;file&quot;: &quot;/var/www/html/backend/app/Http/Controllers/AdditionalController.php&quot;,
    &quot;line&quot;: 29,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/var/www/html/backend/app/Http/Controllers/AdditionalController.php&quot;,
            &quot;line&quot;: 29,
            &quot;function&quot;: &quot;handleError&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Bootstrap\\HandleExceptions&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Controller.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;weather&quot;,
            &quot;class&quot;: &quot;App\\Http\\Controllers\\AdditionalController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;callAction&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Controller&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Route.php&quot;,
            &quot;line&quot;: 262,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\ControllerDispatcher&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Route.php&quot;,
            &quot;line&quot;: 205,
            &quot;function&quot;: &quot;runController&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 721,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Routing\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/app/Http/Middleware/StaticAPIAuth.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;App\\Http\\Middleware\\StaticAPIAuth&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 127,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 55,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 723,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 698,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 662,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 651,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/fruitcake/laravel-cors/src/HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 118,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 75,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 136,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 298,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 121,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 1015,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Console/Application.php&quot;,
            &quot;line&quot;: 94,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-additional-weather" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-additional-weather"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-additional-weather"></code></pre>
</span>
<span id="execution-error-GETapi-additional-weather" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-additional-weather"></code></pre>
</span>
<form id="form-GETapi-additional-weather" data-method="GET"
      data-path="api/additional/weather"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-additional-weather', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/additional/weather</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-user-auth">Authenticate method</h2>

<p>
</p>



<span id="example-requests-POSTapi-user-auth">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/user/auth"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-auth">
</span>
<span id="execution-results-POSTapi-user-auth" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-auth"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-auth"></code></pre>
</span>
<span id="execution-error-POSTapi-user-auth" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-auth"></code></pre>
</span>
<form id="form-POSTapi-user-auth" data-method="POST"
      data-path="api/user/auth"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-auth', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/auth</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-user-registration">Registration account</h2>

<p>
</p>



<span id="example-requests-POSTapi-user-registration">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/user/registration"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-registration">
</span>
<span id="execution-results-POSTapi-user-registration" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-registration"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-registration"></code></pre>
</span>
<span id="execution-error-POSTapi-user-registration" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-registration"></code></pre>
</span>
<form id="form-POSTapi-user-registration" data-method="POST"
      data-path="api/user/registration"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-registration', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/registration</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-user-data">GET api/user/data</h2>

<p>
</p>



<span id="example-requests-GETapi-user-data">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/user/data"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user-data">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 50
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: false,
    &quot;errors&quot;: [
        {
            &quot;message&quot;: &quot;Client authorization token can't be empty&quot;,
            &quot;code&quot;: 403
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user-data" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user-data"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user-data"></code></pre>
</span>
<span id="execution-error-GETapi-user-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user-data"></code></pre>
</span>
<form id="form-GETapi-user-data" data-method="GET"
      data-path="api/user/data"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user-data', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/data</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-user-filter">Getting list users</h2>

<p>
</p>



<span id="example-requests-POSTapi-user-filter">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/user/filter"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-filter">
</span>
<span id="execution-results-POSTapi-user-filter" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-filter"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-filter"></code></pre>
</span>
<span id="execution-error-POSTapi-user-filter" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-filter"></code></pre>
</span>
<form id="form-POSTapi-user-filter" data-method="POST"
      data-path="api/user/filter"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-filter', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/filter</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-user-update--id-">Update user data</h2>

<p>
</p>



<span id="example-requests-POSTapi-user-update--id-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/user/update/dolor"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-update--id-">
</span>
<span id="execution-results-POSTapi-user-update--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-update--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-update--id-"></code></pre>
</span>
<span id="execution-error-POSTapi-user-update--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-update--id-"></code></pre>
</span>
<form id="form-POSTapi-user-update--id-" data-method="POST"
      data-path="api/user/update/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-update--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/update/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="POSTapi-user-update--id-"
               value="dolor"
               data-component="url" hidden>
    <br>
<p>The ID of the update.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-user--id-">Getting data about user by id</h2>

<p>
</p>



<span id="example-requests-GETapi-user--id-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/user/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 49
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: false,
    &quot;errors&quot;: [
        {
            &quot;message&quot;: &quot;Client authorization token can't be empty&quot;,
            &quot;code&quot;: 403
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user--id-"></code></pre>
</span>
<span id="execution-error-GETapi-user--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user--id-"></code></pre>
</span>
<form id="form-GETapi-user--id-" data-method="GET"
      data-path="api/user/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-user--id-"
               value="16"
               data-component="url" hidden>
    <br>
<p>The ID of the user.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-location-languages">Route for get all languages</h2>

<p>
</p>



<span id="example-requests-GETapi-location-languages">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/location/languages"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-location-languages">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 48
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Русский&quot;,
            &quot;code&quot;: &quot;ru&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Английский&quot;,
            &quot;code&quot;: &quot;en&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Украинский&quot;,
            &quot;code&quot;: &quot;ua&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Турецкий&quot;,
            &quot;code&quot;: &quot;tr&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-location-languages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-location-languages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-location-languages"></code></pre>
</span>
<span id="execution-error-GETapi-location-languages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-location-languages"></code></pre>
</span>
<form id="form-GETapi-location-languages" data-method="GET"
      data-path="api/location/languages"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-location-languages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/location/languages</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-location-countries">Route for getting countries array</h2>

<p>
</p>



<span id="example-requests-GETapi-location-countries">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/location/countries"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-location-countries">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 47
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Российская Федерация&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 17:59:20&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 17:59:20&quot;,
            &quot;language_id&quot;: 1
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Украина&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:02:07&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 18:02:07&quot;,
            &quot;language_id&quot;: 3
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Турция&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:02:07&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 18:02:07&quot;,
            &quot;language_id&quot;: 4
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-location-countries" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-location-countries"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-location-countries"></code></pre>
</span>
<span id="execution-error-GETapi-location-countries" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-location-countries"></code></pre>
</span>
<form id="form-GETapi-location-countries" data-method="GET"
      data-path="api/location/countries"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-location-countries', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/location/countries</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-location-regions--countryId--">Route for getting regions array</h2>

<p>
</p>



<span id="example-requests-GETapi-location-regions--countryId--">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/location/regions/949022"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-location-regions--countryId--">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 46
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-location-regions--countryId--" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-location-regions--countryId--"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-location-regions--countryId--"></code></pre>
</span>
<span id="execution-error-GETapi-location-regions--countryId--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-location-regions--countryId--"></code></pre>
</span>
<form id="form-GETapi-location-regions--countryId--" data-method="GET"
      data-path="api/location/regions/{countryId?}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-location-regions--countryId--', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/location/regions/{countryId?}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>countryId</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="countryId"
               data-endpoint="GETapi-location-regions--countryId--"
               value="949022"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

            <h2 id="endpoints-GETapi-location-regions-search">Search region by text name</h2>

<p>
</p>



<span id="example-requests-GETapi-location-regions-search">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/location/regions/search"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-location-regions-search">
            <blockquote>
            <p>Example response (412):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 45
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: false,
    &quot;errors&quot;: [
        {
            &quot;message&quot;: &quot;Region name is empty or very short!&quot;,
            &quot;code&quot;: 412
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-location-regions-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-location-regions-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-location-regions-search"></code></pre>
</span>
<span id="execution-error-GETapi-location-regions-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-location-regions-search"></code></pre>
</span>
<form id="form-GETapi-location-regions-search" data-method="GET"
      data-path="api/location/regions/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-location-regions-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/location/regions/search</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-location-cities">Route for getting cities array</h2>

<p>
</p>



<span id="example-requests-GETapi-location-cities">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/location/cities"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-location-cities">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 44
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 23,
            &quot;name&quot;: &quot;Сочи&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:08:32&quot;,
            &quot;updated_at&quot;: &quot;2022-01-24 19:21:42&quot;,
            &quot;title&quot;: &quot;В Большом Сочи&quot;,
            &quot;description&quot;: &quot;Окунись в большой мир развлечений Большого Сочи! Много экскурсий и красивых мест. Цены от 250 рублей!&quot;,
            &quot;image&quot;: &quot;&quot;,
            &quot;faq&quot;: &quot;[]&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 47,
            &quot;name&quot;: &quot;Санкт-Петербург&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:08:07&quot;,
            &quot;updated_at&quot;: &quot;2022-01-24 19:22:01&quot;,
            &quot;title&quot;: &quot;В Питере пить?&quot;,
            &quot;description&quot;: &quot;Отличное выражение для начала серьезной гулянки&quot;,
            &quot;image&quot;: &quot;&quot;,
            &quot;faq&quot;: &quot;[]&quot;
        },
        {
            &quot;id&quot;: 50,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 77,
            &quot;name&quot;: &quot;Москва&quot;,
            &quot;created_at&quot;: &quot;2022-01-24 19:23:04&quot;,
            &quot;updated_at&quot;: &quot;2022-01-24 19:23:04&quot;,
            &quot;title&quot;: &quot;Позади нас Москва...&quot;,
            &quot;description&quot;: &quot;Так говорили, но стоит эти текста сейчас заменить&quot;,
            &quot;image&quot;: &quot;&quot;,
            &quot;faq&quot;: &quot;[]&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-location-cities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-location-cities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-location-cities"></code></pre>
</span>
<span id="execution-error-GETapi-location-cities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-location-cities"></code></pre>
</span>
<form id="form-GETapi-location-cities" data-method="GET"
      data-path="api/location/cities"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-location-cities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/location/cities</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-location-cities-search">Search city by text name</h2>

<p>
</p>



<span id="example-requests-GETapi-location-cities-search">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/location/cities/search"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-location-cities-search">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 43
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 23,
            &quot;name&quot;: &quot;Сочи&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:08:32&quot;,
            &quot;updated_at&quot;: &quot;2022-01-24 19:21:42&quot;,
            &quot;title&quot;: &quot;В Большом Сочи&quot;,
            &quot;description&quot;: &quot;Окунись в большой мир развлечений Большого Сочи! Много экскурсий и красивых мест. Цены от 250 рублей!&quot;,
            &quot;image&quot;: &quot;&quot;,
            &quot;faq&quot;: &quot;[]&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 47,
            &quot;name&quot;: &quot;Санкт-Петербург&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:08:07&quot;,
            &quot;updated_at&quot;: &quot;2022-01-24 19:22:01&quot;,
            &quot;title&quot;: &quot;В Питере пить?&quot;,
            &quot;description&quot;: &quot;Отличное выражение для начала серьезной гулянки&quot;,
            &quot;image&quot;: &quot;&quot;,
            &quot;faq&quot;: &quot;[]&quot;
        },
        {
            &quot;id&quot;: 50,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 77,
            &quot;name&quot;: &quot;Москва&quot;,
            &quot;created_at&quot;: &quot;2022-01-24 19:23:04&quot;,
            &quot;updated_at&quot;: &quot;2022-01-24 19:23:04&quot;,
            &quot;title&quot;: &quot;Позади нас Москва...&quot;,
            &quot;description&quot;: &quot;Так говорили, но стоит эти текста сейчас заменить&quot;,
            &quot;image&quot;: &quot;&quot;,
            &quot;faq&quot;: &quot;[]&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-location-cities-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-location-cities-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-location-cities-search"></code></pre>
</span>
<span id="execution-error-GETapi-location-cities-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-location-cities-search"></code></pre>
</span>
<form id="form-GETapi-location-cities-search" data-method="GET"
      data-path="api/location/cities/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-location-cities-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/location/cities/search</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-location-areas">Route for getting areas array</h2>

<p>
</p>



<span id="example-requests-GETapi-location-areas">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/location/areas"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-location-areas">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 42
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 23,
            &quot;city_id&quot;: 1,
            &quot;name&quot;: &quot;Адлер&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:11:50&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 18:11:50&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 23,
            &quot;city_id&quot;: 1,
            &quot;name&quot;: &quot;Мацеста&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:11:50&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 18:11:50&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 23,
            &quot;city_id&quot;: 1,
            &quot;name&quot;: &quot;Светлана&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:11:50&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 18:11:50&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 23,
            &quot;city_id&quot;: 1,
            &quot;name&quot;: &quot;Центр&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:11:50&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 18:11:50&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 23,
            &quot;city_id&quot;: 1,
            &quot;name&quot;: &quot;Дагомыс&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:11:50&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 18:11:50&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 23,
            &quot;city_id&quot;: 1,
            &quot;name&quot;: &quot;Мамайка&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:11:50&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 18:11:50&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 23,
            &quot;city_id&quot;: 1,
            &quot;name&quot;: &quot;Хоста&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:11:50&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 18:11:50&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;country_id&quot;: 1,
            &quot;region_id&quot;: 23,
            &quot;city_id&quot;: 1,
            &quot;name&quot;: &quot;Быхта&quot;,
            &quot;created_at&quot;: &quot;2021-12-23 18:11:50&quot;,
            &quot;updated_at&quot;: &quot;2021-12-23 18:11:50&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-location-areas" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-location-areas"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-location-areas"></code></pre>
</span>
<span id="execution-error-GETapi-location-areas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-location-areas"></code></pre>
</span>
<form id="form-GETapi-location-areas" data-method="GET"
      data-path="api/location/areas"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-location-areas', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/location/areas</code></b>
        </p>
                    </form>

            <h2 id="endpoints-PUTapi-location-city--id-">Update city</h2>

<p>
</p>



<span id="example-requests-PUTapi-location-city--id-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/location/city/18"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-location-city--id-">
</span>
<span id="execution-results-PUTapi-location-city--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-location-city--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-location-city--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-location-city--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-location-city--id-"></code></pre>
</span>
<form id="form-PUTapi-location-city--id-" data-method="PUT"
      data-path="api/location/city/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-location-city--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/location/city/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-location-city--id-"
               value="18"
               data-component="url" hidden>
    <br>
<p>The ID of the city.</p>
            </p>
                    </form>

            <h2 id="endpoints-POSTapi-location-city">Create city</h2>

<p>
</p>



<span id="example-requests-POSTapi-location-city">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/location/city"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-location-city">
</span>
<span id="execution-results-POSTapi-location-city" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-location-city"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-location-city"></code></pre>
</span>
<span id="execution-error-POSTapi-location-city" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-location-city"></code></pre>
</span>
<form id="form-POSTapi-location-city" data-method="POST"
      data-path="api/location/city"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-location-city', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/location/city</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-roles">Getting list roles</h2>

<p>
</p>



<span id="example-requests-GETapi-roles">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/roles"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-roles">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 41
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 20,
            &quot;name&quot;: &quot;Пользователь&quot;,
            &quot;is_admin&quot;: false,
            &quot;is_moder&quot;: false
        },
        {
            &quot;id&quot;: 30,
            &quot;name&quot;: &quot;Модератор&quot;,
            &quot;is_admin&quot;: false,
            &quot;is_moder&quot;: true
        },
        {
            &quot;id&quot;: 40,
            &quot;name&quot;: &quot;Администратор&quot;,
            &quot;is_admin&quot;: true,
            &quot;is_moder&quot;: true
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-roles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-roles"></code></pre>
</span>
<span id="execution-error-GETapi-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-roles"></code></pre>
</span>
<form id="form-GETapi-roles" data-method="GET"
      data-path="api/roles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/roles</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-subscribe">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-POSTapi-subscribe">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/subscribe"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-subscribe">
</span>
<span id="execution-results-POSTapi-subscribe" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-subscribe"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-subscribe"></code></pre>
</span>
<span id="execution-error-POSTapi-subscribe" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-subscribe"></code></pre>
</span>
<form id="form-POSTapi-subscribe" data-method="POST"
      data-path="api/subscribe"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-subscribe', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/subscribe</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-attachment-upload">File uploader</h2>

<p>
</p>



<span id="example-requests-POSTapi-attachment-upload">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/attachment/upload"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-attachment-upload">
</span>
<span id="execution-results-POSTapi-attachment-upload" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-attachment-upload"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-attachment-upload"></code></pre>
</span>
<span id="execution-error-POSTapi-attachment-upload" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-attachment-upload"></code></pre>
</span>
<form id="form-POSTapi-attachment-upload" data-method="POST"
      data-path="api/attachment/upload"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-attachment-upload', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/attachment/upload</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-blog">Create row in database</h2>

<p>
</p>



<span id="example-requests-POSTapi-blog">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/blog"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-blog">
</span>
<span id="execution-results-POSTapi-blog" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-blog"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-blog"></code></pre>
</span>
<span id="execution-error-POSTapi-blog" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-blog"></code></pre>
</span>
<form id="form-POSTapi-blog" data-method="POST"
      data-path="api/blog"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-blog', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/blog</code></b>
        </p>
                    </form>

            <h2 id="endpoints-PUTapi-blog--id-">Update post data</h2>

<p>
</p>



<span id="example-requests-PUTapi-blog--id-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/blog/mollitia"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-blog--id-">
</span>
<span id="execution-results-PUTapi-blog--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-blog--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-blog--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-blog--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-blog--id-"></code></pre>
</span>
<form id="form-PUTapi-blog--id-" data-method="PUT"
      data-path="api/blog/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-blog--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/blog/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="PUTapi-blog--id-"
               value="mollitia"
               data-component="url" hidden>
    <br>
<p>The ID of the blog.</p>
            </p>
                    </form>

            <h2 id="endpoints-DELETEapi-blog--id-">Remove blog post</h2>

<p>
</p>



<span id="example-requests-DELETEapi-blog--id-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/blog/quia"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-blog--id-">
</span>
<span id="execution-results-DELETEapi-blog--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-blog--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-blog--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-blog--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-blog--id-"></code></pre>
</span>
<form id="form-DELETEapi-blog--id-" data-method="DELETE"
      data-path="api/blog/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-blog--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/blog/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="DELETEapi-blog--id-"
               value="quia"
               data-component="url" hidden>
    <br>
<p>The ID of the blog.</p>
            </p>
                    </form>

            <h2 id="endpoints-POSTapi-blog--position---id-">Set position for post</h2>

<p>
</p>



<span id="example-requests-POSTapi-blog--position---id-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/blog/possimus/laborum"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-blog--position---id-">
</span>
<span id="execution-results-POSTapi-blog--position---id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-blog--position---id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-blog--position---id-"></code></pre>
</span>
<span id="execution-error-POSTapi-blog--position---id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-blog--position---id-"></code></pre>
</span>
<form id="form-POSTapi-blog--position---id-" data-method="POST"
      data-path="api/blog/{position}/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-blog--position---id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/blog/{position}/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="position"
               data-endpoint="POSTapi-blog--position---id-"
               value="possimus"
               data-component="url" hidden>
    <br>

            </p>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="POSTapi-blog--position---id-"
               value="laborum"
               data-component="url" hidden>
    <br>
<p>The ID of the {position}.</p>
            </p>
                    </form>

            <h2 id="endpoints-POSTapi-blog-category">Create category for posts</h2>

<p>
</p>



<span id="example-requests-POSTapi-blog-category">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/blog/category"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-blog-category">
</span>
<span id="execution-results-POSTapi-blog-category" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-blog-category"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-blog-category"></code></pre>
</span>
<span id="execution-error-POSTapi-blog-category" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-blog-category"></code></pre>
</span>
<form id="form-POSTapi-blog-category" data-method="POST"
      data-path="api/blog/category"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-blog-category', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/blog/category</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-blog-filter">Getting posts by filter</h2>

<p>
</p>



<span id="example-requests-POSTapi-blog-filter">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/blog/filter"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-blog-filter">
</span>
<span id="execution-results-POSTapi-blog-filter" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-blog-filter"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-blog-filter"></code></pre>
</span>
<span id="execution-error-POSTapi-blog-filter" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-blog-filter"></code></pre>
</span>
<form id="form-POSTapi-blog-filter" data-method="POST"
      data-path="api/blog/filter"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-blog-filter', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/blog/filter</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-blog-categories">Getting all categories</h2>

<p>
</p>



<span id="example-requests-GETapi-blog-categories">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/blog/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blog-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 40
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Блог&quot;,
            &quot;code&quot;: &quot;blog&quot;,
            &quot;description&quot;: &quot;Основной блог&quot;,
            &quot;created_user_id&quot;: 2,
            &quot;edit_user_id&quot;: 2,
            &quot;created_at&quot;: &quot;2022-01-24 21:28:31&quot;,
            &quot;updated_at&quot;: &quot;2022-01-24 21:29:28&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Блог1&quot;,
            &quot;code&quot;: &quot;blog1&quot;,
            &quot;description&quot;: &quot;Основной блог1&quot;,
            &quot;created_user_id&quot;: 3,
            &quot;edit_user_id&quot;: 3,
            &quot;created_at&quot;: &quot;2022-02-15 18:24:58&quot;,
            &quot;updated_at&quot;: &quot;2022-02-15 18:24:58&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blog-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blog-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blog-categories"></code></pre>
</span>
<span id="execution-error-GETapi-blog-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blog-categories"></code></pre>
</span>
<form id="form-GETapi-blog-categories" data-method="GET"
      data-path="api/blog/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blog-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blog/categories</code></b>
        </p>
                    </form>

            <h2 id="endpoints-GETapi-blog--id-">Getting single post</h2>

<p>
</p>



<span id="example-requests-GETapi-blog--id-">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/blog/ipsum"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blog--id-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 39
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;App\\Http\\Controllers\\BlogController::single(): Argument #1 ($id) must be of type int, string given, called in /var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Controller.php on line 54&quot;,
    &quot;exception&quot;: &quot;TypeError&quot;,
    &quot;file&quot;: &quot;/var/www/html/backend/app/Http/Controllers/BlogController.php&quot;,
    &quot;line&quot;: 319,
    &quot;trace&quot;: [
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Controller.php&quot;,
            &quot;line&quot;: 54,
            &quot;function&quot;: &quot;single&quot;,
            &quot;class&quot;: &quot;App\\Http\\Controllers\\BlogController&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;callAction&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Controller&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Route.php&quot;,
            &quot;line&quot;: 262,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\ControllerDispatcher&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Route.php&quot;,
            &quot;line&quot;: 205,
            &quot;function&quot;: &quot;runController&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 721,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Route&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Routing\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/app/Http/Middleware/StaticAPIAuth.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;App\\Http\\Middleware\\StaticAPIAuth&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\SubstituteBindings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 127,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;handleRequest&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php&quot;,
            &quot;line&quot;: 55,
            &quot;function&quot;: &quot;handleRequestUsingNamedLimiter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Middleware\\ThrottleRequests&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 723,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 698,
            &quot;function&quot;: &quot;runRouteWithinStack&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 662,
            &quot;function&quot;: &quot;runRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Routing/Router.php&quot;,
            &quot;line&quot;: 651,
            &quot;function&quot;: &quot;dispatchToRoute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;dispatch&quot;,
            &quot;class&quot;: &quot;Illuminate\\Routing\\Router&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 128,
            &quot;function&quot;: &quot;Illuminate\\Foundation\\Http\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php&quot;,
            &quot;line&quot;: 31,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php&quot;,
            &quot;line&quot;: 21,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\TrimStrings&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php&quot;,
            &quot;line&quot;: 27,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php&quot;,
            &quot;line&quot;: 86,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/fruitcake/laravel-cors/src/HandleCors.php&quot;,
            &quot;line&quot;: 52,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Fruitcake\\Cors\\HandleCors&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php&quot;,
            &quot;line&quot;: 39,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 167,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Http\\Middleware\\TrustProxies&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php&quot;,
            &quot;line&quot;: 103,
            &quot;function&quot;: &quot;Illuminate\\Pipeline\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 142,
            &quot;function&quot;: &quot;then&quot;,
            &quot;class&quot;: &quot;Illuminate\\Pipeline\\Pipeline&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php&quot;,
            &quot;line&quot;: 111,
            &quot;function&quot;: &quot;sendRequestThroughRouter&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Http\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 287,
            &quot;function&quot;: &quot;callLaravelOrLumenRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 89,
            &quot;function&quot;: &quot;makeApiCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 45,
            &quot;function&quot;: &quot;makeResponseCall&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Strategies/Responses/ResponseCalls.php&quot;,
            &quot;line&quot;: 35,
            &quot;function&quot;: &quot;makeResponseCallIfConditionsPass&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 222,
            &quot;function&quot;: &quot;__invoke&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 179,
            &quot;function&quot;: &quot;iterateThroughStrategies&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Extracting/Extractor.php&quot;,
            &quot;line&quot;: 116,
            &quot;function&quot;: &quot;fetchResponses&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 118,
            &quot;function&quot;: &quot;processRoute&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Extracting\\Extractor&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 75,
            &quot;function&quot;: &quot;extractEndpointsInfoFromLaravelApp&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/GroupedEndpoints/GroupedEndpointsFromApp.php&quot;,
            &quot;line&quot;: 51,
            &quot;function&quot;: &quot;extractEndpointsInfoAndWriteToDisk&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/knuckleswtf/scribe/src/Commands/GenerateDocumentation.php&quot;,
            &quot;line&quot;: 50,
            &quot;function&quot;: &quot;get&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\GroupedEndpoints\\GroupedEndpointsFromApp&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 36,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Knuckles\\Scribe\\Commands\\GenerateDocumentation&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Container/Util.php&quot;,
            &quot;line&quot;: 40,
            &quot;function&quot;: &quot;Illuminate\\Container\\{closure}&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 93,
            &quot;function&quot;: &quot;unwrapIfClosure&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Util&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;callBoundMethod&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Container/Container.php&quot;,
            &quot;line&quot;: 653,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\BoundMethod&quot;,
            &quot;type&quot;: &quot;::&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 136,
            &quot;function&quot;: &quot;call&quot;,
            &quot;class&quot;: &quot;Illuminate\\Container\\Container&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/symfony/console/Command/Command.php&quot;,
            &quot;line&quot;: 298,
            &quot;function&quot;: &quot;execute&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Console/Command.php&quot;,
            &quot;line&quot;: 121,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Command\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 1015,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Command&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 299,
            &quot;function&quot;: &quot;doRunCommand&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/symfony/console/Application.php&quot;,
            &quot;line&quot;: 171,
            &quot;function&quot;: &quot;doRun&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Console/Application.php&quot;,
            &quot;line&quot;: 94,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Symfony\\Component\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php&quot;,
            &quot;line&quot;: 129,
            &quot;function&quot;: &quot;run&quot;,
            &quot;class&quot;: &quot;Illuminate\\Console\\Application&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        },
        {
            &quot;file&quot;: &quot;/var/www/html/backend/artisan&quot;,
            &quot;line&quot;: 37,
            &quot;function&quot;: &quot;handle&quot;,
            &quot;class&quot;: &quot;Illuminate\\Foundation\\Console\\Kernel&quot;,
            &quot;type&quot;: &quot;-&gt;&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blog--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blog--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blog--id-"></code></pre>
</span>
<span id="execution-error-GETapi-blog--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blog--id-"></code></pre>
</span>
<form id="form-GETapi-blog--id-" data-method="GET"
      data-path="api/blog/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blog--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blog/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-blog--id-"
               value="ipsum"
               data-component="url" hidden>
    <br>
<p>The ID of the blog.</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-blog">Getting all posts from blog</h2>

<p>
</p>



<span id="example-requests-GETapi-blog">
<blockquote>Example request:</blockquote>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://u-gid.com/api/blog"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "0x11c22a22123eb42862c215fcb53eac33ebe2xc",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-blog">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 38
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: true,
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: 32,
                &quot;is_week&quot;: false,
                &quot;is_main&quot;: false,
                &quot;title&quot;: &quot;Отдых с ребенком в Москве&quot;,
                &quot;code&quot;: &quot;otdih-s-rebenkom-v-moskve&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;Приезжая в столицу России, все бегут смотреть на красоты города и это естественно. Город очень большой и исторических или просто красивых мест полно. Проблема заключается только в том, что именно интересно вам или вашей семье (если вы приехали не одни). Эта статья именно про это, куда же сходить и на что посмотреть на отдыхе в Москве с ребенком. Мы собрали те места, которые будут интересны в первую очередь вашем детям. Список не полный, мест очень много, мы выбрали несколько и разбили их по следующим критериям:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - музеи&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - развлекательные места (цирки, дельфинарии, зоопарки и т.д.)&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - парки и аттракционы&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;По каждому пункту выбрано несколько мест. Если же вас интересует более подробная информация, то вы можете самостоятельно просмотреть ее на нашем сайте - u-gid.com.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1 &ndash; Музеи&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Начать свой список мы бы хотели с музеев. Просто слушать историю о чем либо, детям чаще всего не интересно (либо быстро наскучивает). Мы же подобрали те места, которые затягивают как взрослых, так и детей, а вся экскурсия пролетит быстро и незаметно, но очень интересно и познавательно.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.1&lt;/strong&gt; &lt;strong&gt;Музей &ldquo;У Троицы&rdquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/у троицы.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Если вы хотите прочувствовать быт русского человека 19-20 веков, то вам обязательно стоит посетить этот музей.&lt;/p&gt;&lt;p&gt;Это деревянное здание, когда то было домом семьи купцов Неделяевых, сейчас же, это здание принадлежит Подворью Троице-Сергиевой Лавры. В доме остались старые вещи и практически нетронутая атмосфера былых веков.&lt;/p&gt;&lt;p&gt;Во время экскурсии, вам будет рассказано очень много интересных и для кого-то удивительных фактов, а уже после экскурсии можно будет выпить чашечку чая и задать те вопросы, которые у вас появятся.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Музей находится по адресу: Троицкая 7/1&lt;/p&gt;&lt;p&gt;Цена на экскурсию от 500 рублей (актуальные цены лучше уточнить на кассе).&lt;/p&gt;&lt;p&gt;Очень интересное, а самое главное познавательное место, советуем к посещению.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.2 Музей Московской железной дороги&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.2.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Если вам всегда была интересна тематика железных дорог, то этот музей вас очень удивит и обрадует. В Московском музее железных дорог собраны экспонаты как современные, так и исторические, а площадь техники под открытым небом составляет более гектара.&lt;/p&gt;&lt;p&gt;Более 70 экспонатов включающие в себя как поезда и вагоны, так и специализированную технику. Все экспонаты ранее были работающей единицей, которая сейчас на заслуженном отдыхе. Реставрацию все объекты проходят по мере изнашиваемости (часто реставрацией занимаются сами работники музея).&lt;/p&gt;&lt;p&gt;Прийти сюда стоит! Можно прийти семьей (маленьким детям очень понравится), а можно и самостоятельно (взрослому человеку тоже будет многое интересно).&lt;/p&gt;&lt;p&gt;Вход в музей платны и составляет:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 150 рублей &ndash; полный билет&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 100 рублей - от 7 до 18 лет и пенсионерам&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 60 рублей &ndash; детям до 7 лет&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Музей Московской железной дороги находится по адресу: Рижская площадь 1&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.3 Музей Москва-Сити&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.3.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Если вы любите ходить по музеям и вам нравится высота, то это место именно для вас. Музей Москва-Сити является единственным и самым высоким музеем небоскребом в Европе.&lt;/p&gt;&lt;p&gt;Музей Москва-Сити был открыт в 2017 году 1 июля. Многих привлекает даже не сам музей, а смотровая площадка которая есть в музее, позволяющая посмотреть на столицу с высоты 215 метров.&lt;/p&gt;&lt;p&gt;В музее очень много информации о том как &ldquo;росла&rdquo; Москва. Проекты архитекторов и прообразы современных небоскребов.&lt;/p&gt;&lt;p&gt;Музей Москва-Сити находится по адресу: Пресненская набережная 6 стр.2 башня &ldquo;Империя&rdquo;. Музей работает со вторника по воскресенье, информацию по ценам уточняйте на сайте музея или на кассах.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.4 Экспозиционно-мемориальный отдел &ldquo;Пресня&rdquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.4.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Этот музей показывает быт российского человека XX века. В самом музее есть 17 интерьеров быта того времени, которые менялись в переломные моменты истории России.&lt;/p&gt;&lt;p&gt;Музей открыт для туристов и посетителей каждый день кроме понедельника. Есть два сеанса - исторический и архитектурный.&lt;/p&gt;&lt;p&gt;Само же здание пережило очень много исторических моментов: вооруженные восстания Первой русской революции, бои октябрьской революции, был местом сбора ополченцев. Все эти моменты так же есть в отражении экспозиций музея.&lt;/p&gt;&lt;p&gt;Экспозиционно-мемориальный отдел &ldquo;Пресня&rdquo; находится по адресу: переулок Большой Предтеченский 4&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.5 Российский музей леса&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.5.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Большая часть нашей необъятной страны покрыто лесом и является важной составляющей для всего мира. Об этом и рассказывает музей. Вся информация которая собрана в музее за долгое время существования, направлена на правильное отношение к лесу (сохранение/восстановление/использование).&lt;/p&gt;&lt;p&gt;Вам расскажут о животных обитающих в лесах, о полезности леса для окружающей среды и конечно историю лесопользования. Информацию интересна как маленьким гостям, так и взрослым.&lt;/p&gt;&lt;p&gt;Российский музей леса находится по адресу: пер. Монетчиковский 5-й д.4&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.6 Монументальные часы Ракета&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.6.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Это самые большие механические часы &ldquo;Ракета&rdquo;. Какого только металла в них нет и сталь, и титан, и алюминий и даже золото. Вес часов 4,5 тонны, а диаметр составляет 3 метра, длина же маятника почти 13 метров. Такую конструкцию, построили и установили всего за 6 месяцев.&lt;/p&gt;&lt;p&gt;Расположены часы на Лубянской площади в главном атриуме Центрального детского магазина на Лубянке. Построены часы были в 2014 году, а открыты были в январе 2015 года мэром Москвы Сергеем Собяниным.&lt;/p&gt;&lt;p&gt;Стоит посмотреть и оценить масштабы этого творения.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2 &ndash; Детские развлекательные места (цирк, дельфинарий и т.д)&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;В отличии от поиска музеев, в поиске развлекательной программы для ребенка все проще. Какой ребенок не любит развлечения? Эмоции, радость и приятные воспоминания, вот неполный список того, что получит ваш ребенок посетив следующие места.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.1 Московский зоопарк&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.1.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Московский зоопарк является первым зоопарков в России и был открыт в 1864 году. Создателями зоопарка считаются Императорское Русское общество, на чьи средства и содержали зоопарк. Основной работой зоопарка считается &ndash; сохранение видов, как исследовательской, так и просветительской деятельности.&lt;/p&gt;&lt;p&gt;В настоящий момент в зоопарке насчитывается более 8 тысяч особей разного вида фауны. Сам зоопарк разделен на секции (в зависимости от животных и естественной среды обитания). Московский зоопарк является членом Всемирной и Европейской ассоциации зоопарков и аквариумов.&lt;/p&gt;&lt;p&gt;Вы можете как самостоятельно прийти и посмотреть на всех животных, так и записаться на специальную экскурсию, а так же есть возможность записать на лекции и семинары.&lt;/p&gt;&lt;p&gt;Московский зоопарк находится по адресу: ул. Большая Грузинская 1. Стоимость билетов:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 800 рублей &ndash; взрослый билет&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - бесплатно &ndash; студенты очной формы, многодетные семьи (от 3-ех и более детей), дети до 17 лет, инвалиды.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Более подробную информацию о стоимости узнавайте на сайте или кассах зоопарка. Отличный вариант для отдыха с ребенком, положительные впечатления будут как у вас, так и у ваших детей.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.2&lt;/strong&gt; &lt;strong&gt;Памятник Клоунам и Московский цирк имени Юрия Никулина&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.2.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Памятник клоунам достаточно противоречивое место среди местных жителей. Одним нравится площадь с памятниками клоунов, а других это место очень пугает в вечернее время.&lt;/p&gt;&lt;p&gt;Расположен фонтан клоунов напротив Московского цирка имени Юрия Никулина. Главной скульптурой фонтана, как нестранно является клоун, который торопиться на выступление. Едет он на одноколесном велосипеде, в одной руке он держит дырявый зонт, а в другой раскрывшийся чемодан, из которого вываливается клоун поменьше.&lt;/p&gt;&lt;p&gt;Вокруг фонтана есть еще несколько клоунов, каждый из них играет свою роль. Кто-то готовиться к цирковому трюку, кто-то играет в чехарду, а кто-то просто наблюдает за происходящем.&lt;/p&gt;&lt;p&gt;На самом деле очень интересное место, где можно посидеть и насладиться &ldquo;вечным&rdquo; цирковым представлением. Ради фотографий, точно стоит прийти и посмотреть!&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ну и конечно стоит сюда прийти и ради представления в цирке. Это один из первых стационарных цирков в России. Вместимость цирка почти 2000 зрителей, а шоу- программы одни из лучших не только в России, но и в мире. Программы в цирке постоянно меняются и описывать их, было бы не совсем верным решением, хотим только озвучить, что любая цирковая программа тут - шедевр!&lt;/p&gt;&lt;p&gt;Что касается цен, то они начинаются от 600 рублей (все зависит от программы и мест), иногда от 1500 рублей. Лучше уточнять актуальные цены на сайте или в кассах цирка.&lt;/p&gt;&lt;p&gt;Дети до 6 лет могут пройти бесплатно без предоставления отдельного посадочного места.&lt;/p&gt;&lt;p&gt;Московский цирк Никулина находится по адресу: Цветной бульвар 13&lt;/p&gt;&lt;p&gt;Обязательно к посещению с детьми!&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.3 Москвариум&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.3.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ваш ребенок любит морских обитателей? Если да, то вам обязательно стоит прийти сюда! Москвариум &ndash; это один из самых крупных океанариумов Европы. Включающий в себя три площадки: центр плавания с дельфином, водную сцену и аквариум.&lt;/p&gt;&lt;p&gt;В центре проводятся лекции, можно записаться на групповые экскурсии, организовать детский праздник. На территории комплекса расположено несколько ресторанов и кафе.&lt;/p&gt;&lt;p&gt;Если посчитать объем воды во всех аквариумах в Москвариуме, то конечная сумма превысит 3000 кубических метров &ndash; это более 80 аквариумов с разными обитателями морской и пресноводной фауны (более 12000 особей).&lt;/p&gt;&lt;p&gt;Прогулочные залы океанариума украшены тематическими муляжами. Можно фотографироваться, снимать морских обитателей без вспышки.&lt;/p&gt;&lt;p&gt;Что касается морских представлений, то они проводятся в основном зале. Шоу проводится с участием белух, моржей, морских львов, дельфинов и многих других обитателей. Одновременно наблюдать ха шоу могут 2300 гостей.&lt;/p&gt;&lt;p&gt;По вопросу цены, лучше обратиться на сайт Москвариума или в казах здания, так как цены тут зависят от того что вам интересно (только представление, посещение выставки или посещение аквариума). Для отдыха с детьми лучшее место!&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3 &ndash; Парки и аттракционы&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ну а теперь мы поговорим о парках и аттракционах. Выбор мы остановили только на тех местах, где можно погулять (но обязательно были детские площадки или зоны отдыха) или где можно покататься на аттракционах. Стоит напомнить, что в список попали только лучшее места в своей категории, все развлекательные и прогулочные парки вы можете просмотреть на нашем сайте - u-gid.com.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.1 Парк Искусств Музеон&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/3.1.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Парк под открытым небом. В парке все экспозиции находятся на улице. Собраны экспонаты советского прошлого и настоящего, как признанных мастеров своего дела, так и малоизвестных, а выполнение у каждого свое. В парке часто проводятся выставки, встречи и многое другое.&lt;/p&gt;&lt;p&gt;Парк находится в одной из зеленых зон Москвы (Крымская набережная). Сама идея расположения экспонатов на улице в одном месте и создание парка, появилась в 1991 году. Когда подготовительные действия закончились и вопросы с постановлением были закрыты, парк начала свое существование, а датой открытия принято считать 24 января 1992 год.&lt;/p&gt;&lt;p&gt;В настоящее время вся территория парка озеленена, вдоль дорожек установлены лавочки и шезлонги, а так же беседки и павильоны.&lt;/p&gt;&lt;p&gt;Пакр искусств Музеон работает ежедневно с 09:00 до 23:00, вход в парк абсолютно бесплатный. Адрес: Крымский Вал, владение 2&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.2 Парк Красная Пресня&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/3.2.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;История парка начинается в 1932 году, он был построен на территории памятника садово-парковой архитектуры XVIII века. В Москве парков такого типа более нет (единственный образец &ldquo;голландского стиля&rdquo; петровского времени).&lt;/p&gt;&lt;p&gt;Площадь парка составляет более 16 гектаров, а деревья в основном тополиные и липовые. От советского времени в парке сохранились части летнего театра и памятник В.И. Ленину. В 2010 году начата работа по восстановлению усадьбы.&lt;/p&gt;&lt;p&gt;В парке очень много разнообразных площадок, как для активного отдыха, так и для занятия спортом, также катки и танцевальные площадки. Место подойдет, как для неспешной прогулки, так и для спортивного отдыха.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.3 Парк аттракционов Остров мечты&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/3.3.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Что может быть лучше для ребенка, чем парк аттракционов? Остров мечты &ndash; по праву получил сове название, как Московский Диснейленд. Связано это с тем, что территория парка превышает 700 тысяч квадратных метров. Парк поделен на 2 зоны:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - крытая&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - открытая&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Если говорить о парке в целом, то он насчитывает 33 аттракциона (разной возрастной категирии) которые позволят развлечься как взрослым, так и детям. Есть 9 тематических зон (страна динозавров, замок Снежной королевы, Черепашки Ниндзя и другие), которые позволят вам окунуться в детство и просто наслаждаться отдыхом с вашими детьми.&lt;/p&gt;&lt;p&gt;Так же, есть и просто прогулочная территория. Где можно гулять и наслаждаться видами парка.&lt;/p&gt;&lt;p&gt;Цены в парке зависят от некоторых факторов: день недели и тариф &ndash; от 700 до 2500 рублей (в цену входит посещение всех аттракционов неоднократное количество раз за один день). Есть возможность воспользоваться услугой Fast Pass для быстрого прохода без ожидания в общей очереди. Цена такой услуги составляет&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 4300 рублей &ndash; в будни&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 4800 рублей &ndash; в выходные&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Рекомендуем проверять цены перед посещением парка (возможно изменение цены). Приобрести билеты вы можете, на сайте парка или в кассах.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Если кратко подводить итог статьи, то мест куда можно сходить с ребенком в Москве очень много. Мы описали только малую часть. Вам нужно определиться какой это будет вид отдыха и спланировать маршрут заранее. Эмоций и воспоминаний столица России подарит вам с полна, а этот отдых будет одним из лучших в воспоминании детей. Если вам интересны другие достопримечательности Москвы или других городов, то вы можете детально узнать всю информацию (экскурсии/достопримечательности/бары и рестораны) у нас на сайте - u-gid.com. Переходите на сайт, выбирайте интересующий вас город и планируйте свое путешествие заранее!&lt;/p&gt;&lt;p&gt;Хорошего вам отдыха и ярких впечатлений!&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&quot;,
                &quot;user_id&quot;: 9,
                &quot;status&quot;: 1,
                &quot;views&quot;: 0,
                &quot;likes&quot;: 0,
                &quot;favorites&quot;: 0,
                &quot;comments&quot;: 0,
                &quot;country_id&quot;: 1,
                &quot;region_id&quot;: null,
                &quot;city_id&quot;: null,
                &quot;area_id&quot;: null,
                &quot;language_id&quot;: 1,
                &quot;company_id&quot;: null,
                &quot;category_id&quot;: 1,
                &quot;image&quot;: &quot;/attachments/2022/04/05/Отдых в Москве с ребенком.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-04-05 08:06:17&quot;,
                &quot;updated_at&quot;: &quot;2022-04-05 09:05:36&quot;,
                &quot;tags&quot;: &quot;&quot;,
                &quot;seo_description&quot;: &quot;Отдых с ребенком в Москве. Куда сходить, что посмотреть и чем заняться? Все ответы в этой статье&quot;,
                &quot;published_at&quot;: &quot;2022-04-05 09:05:21&quot;
            },
            {
                &quot;id&quot;: 33,
                &quot;is_week&quot;: false,
                &quot;is_main&quot;: false,
                &quot;title&quot;: &quot;Куда сходить в Лазаревском?&quot;,
                &quot;code&quot;: &quot;kuda-shodity-v-lazarevskom&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;Лазаревский район, самый отдаленный район от Адлера. Дорога от аэропорта до ближайших курортных поселков района Лазаревский (Лазаревское, Аше, Лоо, Вардане, Дагомыс) может занять около 2 часов. В этом есть как минусы, так и плюсы проживания и отдыха в этих местах.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Если говорить о плюсах, то тут меньше туристов и спокойнее обстановка в принципе. Больше всего тут будет удобно отдыхать семьей или с детьми. Очень уютно и спокойно. Ну и конечно цены тут меньше чем в Адлере и Центральном Сочи.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Минусы тоже есть, длительная дорога от аэропорта и большая отдаленность от популярных достопримечательностей (Олимпийский Парк, Красная поляна и т.д.)&lt;/p&gt;&lt;p&gt;Если говорить в целом, то пляжи тут ухоженные и не хуже набережных в другом Большом Сочи. Есть все необходимое для отдыха и развлечения. Мы подобрали некоторые места, куда можно сходить, что посмотреть и где погулять.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1 &ndash; Достопримечательности&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.1 Крабовое ущелье&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.1.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Крабовое ущелье расположено в поселке Лазаревское. Одно из самых красивый творений природы в &ldquo;Большом Сочи&rdquo;. Добраться до места не просто, но поверьте это стоит того. Виды самого ущелья, водопады и купели в которые можно окунуться.&lt;/p&gt;&lt;p&gt;Название &ldquo;Крабовое ущелье&rdquo; стало таковым из за крабов, которые обитают в воде. Местные очень горды этим фактом, так как крабы находятся в очень благоприятных условиях. К сожалению увидеть их сложно, сами крабы очень боятся шума и имеют серый окрас, что позволяет им сливаться с дном.&lt;/p&gt;&lt;p&gt;Если вы все-таки собрались посетить &ldquo;Крабовое ущелье&rdquo;, стоит подумать над одеждой. Вам нужно подниматься и спускаться по крутым склонам, обувь должна быть соответствующей, а так как все это находится в лесу, то советуем одеться по теплее (в зависимости от погоды).&lt;/p&gt;&lt;p&gt;Что касается цены, вход в &ldquo;Крабовое ущелье&rdquo; платный, один билет обойдется вам в 200 рублей.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.2 Подвесной мост&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.2.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Подвесной мост или как его еще называют &ldquo;Поцелуйкин мост&rdquo; является достопримечательностью Лазаревского. Мост расположен над рекой Псезуапсе и в 90-е года помогал жителям без транспорта быстро попадать в соседнее село Алексеевское.&lt;/p&gt;&lt;p&gt;На самом деле мост находится на не большой высоте, но из за своей длинны (почти 90 метров), не каждый сможет полностью его пройти, так как мост очень сильно шатается. Если же пройти мимо моста и попробовать обойти его, то вам потребуется сделать крюк в 5 км. Но мы все-таки, настоятельно рекомендуем пройтись по этому мосту, впечатления и шикарный вид гарантированы. Тем более что это все бесплатно, главное перебороть свой страх, не переживайте, мост очень прочный и упасть с него невозможно.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.3 Храм Николая Чудотворца&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.3.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Храм Николаю Чудотворцу был построен в 1999 году. Построен храм в стиле древней Руси и является очень красивым сооружением. Храм был освящен патриархом всея Руси - Алексием 2, и с тех пор в церковь потекли прихожане. Храм был построен за очень маленький срок (возведение храма произошло всего за 4 месяца).&lt;/p&gt;&lt;p&gt;Внутри церковь поражает своей древнерусской красотой. Резной иконостас был изготовлен русскими ремесленниками, росписи на стенах сделаны в лучших православных традициях, а удивительные иконы написаны в классических стандартах византийской эпохи.&lt;/p&gt;&lt;p&gt;Территория вокруг церкви тоже является своего рода достопримечательностью: вокруг можно встретить множество удивительных экзотических растений, цепляющих взгляд.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2 &ndash; Пешие прогулки&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.1 Набережная&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.1.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Первым делом, куда идут гулять все гости, это конечно набережная. Очень уютная (хоть и в разгар сезона достаточно оживленная) улица, где расположены кафе, магазины и конечно развлекательные площадки. Так же прогулка по набережной позволяет выйти на парк культуры, который расположен по соседству с ней.&lt;/p&gt;&lt;p&gt;Тут главное понимать, что протяженность набережно достаточно большая и если вы устали, то можно расположиться в ближайшем кафе и отдохнуть, тем более что они расположены на протяжении всей набережной, долго искать не придется.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.2 Свирское ущелье&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.2.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Если долгие маршруты вам не страшны, то вам подойдет прогулка по Свирскому ущелью. Добраться до него не сложно, так как начало маршрута начинается еще в Лазаревском нужно просто пройти до конца улицы Свирской и вот вы уже на маршруте.&lt;/p&gt;&lt;p&gt;Протяженность данного маршрута около 6-ти километров, но он не сложный (можно гулять даже с детьми). Главное помнить, что необходимо правильно выбрать обувь и взять с собой запасы воды. Виды тут очень красивые и завораживающие. Если вы любите прогулки, то вам обязательно стоит пройти этот маршрут.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.3 33 водопада&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.3.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Очень популярный маршрут у туристов. В сезон автобусы с людьми едут постоянно, так что советуем посещать это место утром и лучше самостоятельно (так же находится в черте поселка Лазаревское).&lt;/p&gt;&lt;p&gt;Хоть тут и построен определенный маршрут, увидеть с него все водопады не получиться. Если вы хотите посмотреть на все красоты водопадов, то придется самостоятельно забираться по крутым склонам и корням деревьев (такой маршрут будет не всем по силам), но и по обустроенному пути вам будет достаточно красивых мест. Один раз, но обязательно нужно посетить это место, вам точно понравится.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3 &ndash; Рестораны и кафе&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.1 &ldquo;Мексиканский тушкан&rdquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/3.1.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Мексиканский тушкан &ndash; это lounge cafe, которое является настоящим мексиканским местом Лазаревском. Очень уютное и атмосферное место.&lt;/p&gt;&lt;p&gt;Заведение заманивает не только видами и расположением (кафе расположено возле моря), но и возможностью угодить любому гостю, как маленьким гостям, так и взрослым. Есть 2 зоны, комфортные столы с диванчиками и маленькие столики с подушками, а для самых маленьких есть игровая площадка.&lt;/p&gt;&lt;p&gt;Молодежь привлекает не только кухня, но и красивая фотозона (рядом с территорией кафе есть шезлонги, кресла-качалки и навесы с занавесками).&lt;/p&gt;&lt;p&gt;Если говорить про еду, то тут все стандартно - Мексиканская и Европейская кухни. Средний чек на одного человека составляет примерно 1000 рублей на одного человека (все зависит от вашего аппетита).&lt;/p&gt;&lt;p&gt;Мексиканский тушкан ждет своих гостей по адресу: ул.Лазарева 45&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.2 &ldquo;Каша&rdquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/3.2.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Если вы приехали семьей, то вам обязательно нужно посетить это заведение. Семейный ресторанчик &ldquo;Каша&rdquo; расположен в самом центре Лазаревского, но почему то многие проходят мимо этого места, а очень зря!&lt;/p&gt;&lt;p&gt;Начнем с того, что тут будет комфортно для всех. Меню создано таким образом, что и маленькому гостю и взрослому будет предложено то, что ему по душе.&lt;/p&gt;&lt;p&gt;Всевозможные каши с фруктами и блинчики для маленьких, ну и конечно салаты и мясные блюда для взрослых. К сожалению алкоголя в ресторане нет, но его можно принести с собой и вам против ничего не скажут.&lt;/p&gt;&lt;p&gt;Средний чек на одного человека составляет примерно 1500 рублей (все зависит от вашего аппетита). &ldquo;Каша&rdquo; ждет своих гостей по адресу: ул.Победы 153 В&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.3 &ldquo;Кавказ&rdquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/3.3.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Шоу ресторан &ldquo;Кавказ&rdquo; находиться на главной пешеходной улице &ndash; Янтарной. Это очень вместительный ресторан (220 посадочных мест) который поделен на зоны. Первый этаж &ndash; это веранда с панорамными окнами, дальше уже идут банкетный зал и зона отдыха на балконе.&lt;/p&gt;&lt;p&gt;Главным достоянием ресторана является, новое понимание кавказской кухни. Шеф повар, сохранил традиционные блюда, но и добавил новых красок в свои блюда. Поэтому каждый гость сможет найти то, что ему понравиться. С выбором блюд вам всегда готов помочь персонал и сказать с чего начать в зависимости от ваших предпочтений. Для детей есть отдельное меню, так что и маленькие гости будут в восторге.&lt;/p&gt;&lt;p&gt;Ну и как же кавказский ресторан без вин? Тут с этим проблем нет! Большая винная карта, подборка авторских коктейлей и шоу программы от креативных барменов.&lt;/p&gt;&lt;p&gt;Средний чек на одного человека составляет примерно 1500 &ndash; 2000 рублей (все зависит от вашего аппетита).&lt;/p&gt;&lt;p&gt;Ресторан &ldquo;Кавказ&rdquo; ждет своих гостей по адресу: ул.Янтарная 7/1&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Интересных, красивых и популярных мест в Лазаревском очень много! Большое количество экскурсий (которые чаще всего предлагают в гостиницах и отелях), позволит вам быстрее и более подробно узнать город. Если же вас интересует более подробная информация, то вы так же можете найти ее у нас на сайте https://u-gid.com &ndash; вам нужно найти только интересующий вас раздел. Всю информацию о популярных местах собрать в одной статье невозможно. Начните знакомство с Лазаревском по этим местам, а дальше изучайте его самостоятельно и с каждым разом он будет открывать для все больше и больше. Хорошего вам отдыха и потрясающих впечатлений!&lt;/p&gt;&quot;,
                &quot;user_id&quot;: 9,
                &quot;status&quot;: 1,
                &quot;views&quot;: 0,
                &quot;likes&quot;: 0,
                &quot;favorites&quot;: 0,
                &quot;comments&quot;: 0,
                &quot;country_id&quot;: 1,
                &quot;region_id&quot;: null,
                &quot;city_id&quot;: null,
                &quot;area_id&quot;: null,
                &quot;language_id&quot;: 1,
                &quot;company_id&quot;: null,
                &quot;category_id&quot;: 1,
                &quot;image&quot;: &quot;/attachments/2022/04/05/Куда сходить в Лазаревском.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-04-05 08:13:43&quot;,
                &quot;updated_at&quot;: &quot;2022-04-05 08:18:55&quot;,
                &quot;tags&quot;: &quot;&quot;,
                &quot;seo_description&quot;: &quot;Хотите отдохнуть в Лазаревском? Тогда эта статья специально для вас - интересные места, главные достопримечательности и конечно самые лучшие заведения.&quot;,
                &quot;published_at&quot;: &quot;2022-04-05 08:13:45&quot;
            },
            {
                &quot;id&quot;: 30,
                &quot;is_week&quot;: false,
                &quot;is_main&quot;: false,
                &quot;title&quot;: &quot;Необычные места в Санкт-Петербурге&quot;,
                &quot;code&quot;: &quot;neobichnie-mesta-v-sankt-peterburge&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;Прекрасный город на Ниве, как много мы о нем знаем и что он скрывает от своих гостей? Приезжая каждый раз в этот город, не перестаешь удивляться количеству достопримечательностей и тому, сколько нужно времени чтобы посетить их. В этой статье мы решили рассказать о тех местах, которые позволят увидеть Питер с другой, более тайной стороны. Места мы выбирали на свое усмотрение, необычных мест куда можно сходить в городе, очень много, отметим некоторые.&lt;/p&gt;&lt;p&gt;Мы разделим эти места на два пункта:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Прогулки и достопримечательности&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Заведения&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1 - Прогулки и достопримечательности&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.1 - Дворы и парадные&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.1.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Многие люди знают, что Питер славится своими большими и красивыми парадными, но почему то не пытаются их посмотреть. Да есть вероятность того, что вход в дома часто закрыт или находиться во внутренней стороне дома, а во дворы последнее время закрывают проход и устанавливают замки.&lt;/p&gt;&lt;p&gt;Если у вас все-таки получилось зайти во двор старых домов, то мы вам очень завидуем, так как внутри, своя история и своя атмосфера. Есть еще один вариант, как точно попасть во дворы. В настоящее время в городе проводиться много экскурсий, гиды специально собирают людей и ведут по самым интересным дворам, рассказывая при этом и историю об этих местах.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.2 - Старинные квартиры&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.2.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;У многих людей есть ошибочное мнение, что сейчас все лучше! Это не совсем так, вы когда ни будь видели, как выглядят интерьеры некоторых квартир в Питере. Без преувеличения можно назвать это достопримечательностью. Причем, многие из таких квартир &ndash; коммунальные. Произошло это из-за событий 1917 года, когда большие квартиры (10-15 комнат) состоятельных людей, были отданы простым гражданам. Таким образом, эти квартиры были и у богатых, и у бедных, тем самым собрав немало диковинных интерьеров.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.3 - Васильевский остров&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.3.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Тут надо сразу оговориться, люди приезжают на Васильевский остров, но посещают и смотрят не все. Помимо Кунсткамеры, Биржи и Ростральными колоннами, еще очень много интересного, но чаще всего именно на это смотрят гости города и уезжают. Описывать историю и расположения всех достопримечательностей в этой статье мы не будем. Осмотр всего того, что есть на острове займет у вас не один день, так что лучше воспользоваться экскурсией, вам и покажут и расскажут все легенды, и исторические факты.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.4 &ndash; Сенной рынок&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.4.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Да, возможно вам покажется странным, что мы добавили рынок в список необычных мест. Необычен данный рынок тем, что он возвращает вас в детство! Это рынок который манит вас ароматами фруктов и специй, а кричащие и зазывающие продавцы добавляют антуража и эмоций данному месту. Тем более можно совместить приятное с полезным и поностальгировать и купить необходимые продукты. Главное обязательно смотрите за вещами (это все тот же рынок, как и раньше) и не бойтесь торговаться.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.5 &ndash; Кладбище Александро-Невской Лавры&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.5.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Неспроста мы назвали нашу подборку необычной! Это место очень странное для прогулки, но популярно тем, что тут похоронены известные писатели, композиторы и много других деятелей искусства. Именно поэтому, памятники и надгробия которые установлены тут, без преувеличения можно назвать произведениями искусства. Стоит отметить, что вход на кладбище платный (стоимость лучше уточнить на момент посещения, так как цены могут меняться). Такая прогулка будет уместна не всем, но если вас все-таки заинтересовало, то обязательно стоит сходить и увидеть все своими глазами.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2 &ndash; Заведения&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.1 - Бар &ldquo;1608&rdquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.1.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Если вам надоели бары и рестораны &ldquo;обычного&rdquo; стиля, то вам однозначно стоит посетить бар &ldquo;1608&rdquo;. Сам бар позиционирует себя как элитный мужской бар, стилизованный под классику. Элегантные кожаные кресла и сочетание цветовой гаммы, нагоняют атмосферу, а большой выбор виски (более 80 сортов) помогает ощутить себя &ldquo;боссом&rdquo;.&lt;/p&gt;&lt;p&gt;Если виски вам не интересен, то вы можете заказать ром или полугар, к алкогольным напиткам, вам могут предложить мясные блюда с яркими насыщенными соусами, которые помогают раскрыть вкус виски.&lt;/p&gt;&lt;p&gt;Что касается цены, то для такого рода заведения они не завышены. Средний чек на одного человека составляет примерно 2500 рублей (все зависит от вашего аппетита).&lt;/p&gt;&lt;p&gt;Бар &ldquo;1608&rdquo; ждет своих гостей по адресу: пр.Петровский 5&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.2 -&lt;/strong&gt; &lt;strong&gt;Бар &ldquo;Проходимец&rdquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.2.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Бар &ldquo;Проходимец&rdquo; является настоящим экскурсом в историю, так как, уже более 10 лет он не меняется и тем самым привлекает своих гостей. Отличительной чертой бара принято считать, низкие цены и неформальную обстановку. Как и положено в баре, вас ожидает большой выбор пивных напитков и несколько коктейлей.&lt;/p&gt;&lt;p&gt;К пиву вам могут предложить всевозможные закуски и снеки, а так же пиццу и мясные деликатесы. Бар работает круглосуточно, а на выходных проходят вечеринки с Go-go танцами и выступлениями рок-групп.&lt;/p&gt;&lt;p&gt;Если вы находитесь в Питере, то стоит прийти и получить гамму впечатлений. Что касается цен, то средний чек на одного человека составляет примерно 1000 рублей (все зависит от вашего аппетита).&lt;/p&gt;&lt;p&gt;Бар &ldquo;Проходимец&rdquo; ждет своих гостей по адресу: ул.Рубинштейна 8&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.3 - OSTROVSKIY&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.3.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Не совсем стандартный бар, его нестандартность заключается в том, что тут показывают кино и играют в настольные игры. Кончено без пенного напитка вас не оставят. Более 30 сортов крафтового пива, как от отечественных производителей, так и крупных зарубежный брендов.&lt;/p&gt;&lt;p&gt;К пиву вам готовы предоставить всевозможные закуски и снеки. Так же вам могут подать авторские бургеры и сендвичи. Каждый найдет в этом баре то, что ему будет по вкусу.&lt;/p&gt;&lt;p&gt;Средний чек на одного человека составляет примерно 1000 рублей (все зависит от вашего аппетита). Бар OSTROVSKIY ждет своих гостей по адресу: пр. Клинский 17&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.4 - Диего жжет&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.4.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Этот Бар для тех, кому нужна перчинка в отдыхе. Вас ожидают более 10 сортов крафтового пива европейских брендов. Блюда южноамериканской кухни и конечно большое количество соусов, начиная от простого BBQ до фирменного острого соуса &ldquo;Диего жжет&rdquo;.&lt;/p&gt;&lt;p&gt;Уютная атмосфера и приятная музыка помогу расслабится, а острые соусы добавят те нотки эйфории которые так необходимы после тяжелого рабочего дня. Бар больше подходит для встречи большой компании и веселого времяпрепровождения. Если вы любите проверить свой организм на прочность, то вам обязательно стоит прийти сюда!&lt;/p&gt;&lt;p&gt;Средний чек на одного человека составляет примерно 1200-1500 рублей (все зависит от вашего аппетита). Бар Диего жжет ждет своих гостей по адресу: пр.Рижский 12&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.5 - Depeche Mode&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.5.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Бар Depeche Mode был открыт фанатами одноименной группы. Конечно большой упор в дизайне и антуражности направлен на знаменитую британскую рок-группу. В зале установлены 2 больших телевизора, на которых постоянно показываются клипы Depeche Mode.&lt;/p&gt;&lt;p&gt;Упор в баре сделан в большей степени на коктейли, но и без других алкогольных напитков вас не оставят. Большой выбор пива, как на кранах, так и бутылочное. К напиткам вам могут предложить сырные или мясные закуски и снеки. Если вы фанат группы Depeche Mode, то вам обязательно стоит посетить это место и спеть песню своей любимой группы в караоке.&lt;/p&gt;&lt;p&gt;Средний чек на одного человека составляет примерно 1200-1500 рублей (все зависит от вашего аппетита). Бар Depeche Mode ждет своих гостей по адресу: пер.Гривцова 2&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Продолжать такие списки можно бесконечно, вам нужно только определиться, что именно вы хотите, а дальше просто поискать и вы обязательно найдете это в Питере! Для получения более подробной информации о том или ином месте, вы можете зайти на наш сайт в интересующий вас раздел и посмотреть все подробно на u-gid.com. Переходите на сайт, выбирайте интересующий вас город и планируйте свое путешествие заранее!&lt;/p&gt;&lt;p&gt;Хорошего вам отдыха и ярких впечатлений!&lt;/p&gt;&quot;,
                &quot;user_id&quot;: 9,
                &quot;status&quot;: 1,
                &quot;views&quot;: 0,
                &quot;likes&quot;: 0,
                &quot;favorites&quot;: 0,
                &quot;comments&quot;: 0,
                &quot;country_id&quot;: 1,
                &quot;region_id&quot;: null,
                &quot;city_id&quot;: null,
                &quot;area_id&quot;: null,
                &quot;language_id&quot;: 1,
                &quot;company_id&quot;: null,
                &quot;category_id&quot;: 1,
                &quot;image&quot;: &quot;/attachments/2022/04/05/Необычные_места_в_Санкт_Петербурге.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-04-05 07:30:51&quot;,
                &quot;updated_at&quot;: &quot;2022-04-05 07:56:00&quot;,
                &quot;tags&quot;: &quot;&quot;,
                &quot;seo_description&quot;: &quot;Хотели бы вы узнать Питер с другой стороны? Мы собрали самые интересные, но в тоже время необычные места, куда нужно обязательно сходить&quot;,
                &quot;published_at&quot;: &quot;2022-04-05 07:55:54&quot;
            },
            {
                &quot;id&quot;: 31,
                &quot;is_week&quot;: false,
                &quot;is_main&quot;: false,
                &quot;title&quot;: &quot;Куда сходить в Адлере?&quot;,
                &quot;code&quot;: &quot;kuda-shodity-v-adlere&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;Вот вы добрались до Адлера, разместились в гостинице, пора погулять, так как времени не так много. Встает резонный вопрос, а куда кроме моря сходить в Адлере? В этой статье мы разберем самые популярные и самые красивые места в Адлере. В список будут включены достопримечательности и заведения.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1 &ndash; Достопримечательности&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Описывать все достопримечательности Адлера мы не будем, а выделим несколько. Если вас заинтересует более подробнаю информацию о всех интересных местах, вы можете узнать ее на нашем сайте https://u-gid.com, в разделе &ldquo;достопримечательности&rdquo;. Поверьте, все места которые попали в наш список, нужно обязательно посетить и посмотреть на это своими глазами.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.1 Сквер Бестужева&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.1.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Сквер Бестужева находиться в центре Адлера и очень популярен не только для туристов, но и для местных жителей. Это просто зеленый уголок в центре города, который помогает спастись от палящего солнца и спокойно отдохнуть.&lt;/p&gt;&lt;p&gt;Сам парк появился в 1910 году. Основали его два местных жителя Марар и Николаев. Уже позже в парке появились памятники погибшему декабристу А.А. Бестужеву и старинная пушка.&lt;/p&gt;&lt;p&gt;Сквер не большой, но это в нем и привлекательно. На небольшой территории есть и скамейки и детские зоны, для людей по старше есть спортивная площадка. Можно сделать вывод, что парк непримечателен, но это не так, приходя в этот парк, есть возможность просто отдохнуть от городской суеты.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.2 Храм Нерукотворного Образа Христа Спасителя&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.2.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Храм Нерукотворного Образа Христа Спасителя расположен в Имеретинской низменности. В ночное время храм подсвечивается и становиться по настоящему сказочным местом. Построен храм в неовизантийском стиле. У храма есть и второй название, местные жители называют его Олимпийским храмом. Открыт храм был в 2014 году в честь Олимпийских игр. Рядом с храмом расположен приют св. Иоанна Предтечи.&lt;/p&gt;&lt;p&gt;История храма тоже полна неожиданностей. При возведении храма, были обнаружены остатки древневизантийского храма приблизительно VIII века. Камень от этого храма был положен в основание при строительстве.&lt;/p&gt;&lt;p&gt;Храм впервые открыл свои двери на Рождество в 2014 году. На торжественное открытие прибыл и президент РФ В.В. Путин.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.3 Амфибиус&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.3.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Амфибиус &ndash; является частью комплекса &ldquo;Весна&rdquo;. Амфибиус является одним из самых крупных водно-развлекательных комплексов на черноморских курортах. Каждый посетитель найдет для себя то, что ему по душе. Есть большие водные горки и маленькие, глубокие и детские бассейны, а так же зона отдыха и игровые комнаты. Если вы проголодались, то на территории аквапарка вы найдете гриль-бар, пиццерию и палатки с напитками и мороженым.&lt;/p&gt;&lt;p&gt;Из популярных горок в аквапарке стоит выделить:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Камикадзе&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Синяя дыра&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Лагуна&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Все эти горки поразят даже самого бесстрашного посетителя.&lt;/p&gt;&lt;p&gt;Что касается цен:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 1500 рублей взрослый билет&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 800 рублей детям от 3 до 7 лет&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - детям до 3 лет вход бесплатный&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Постояльцам отеля &ldquo;Весна&rdquo; предоставляется скидка в размере 50%. Точные цены уточняйте перед посещением (возможно изменение цены).&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.4 Олимпийский парк&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.4.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Благодаря олимпиаде, в Адлере появилось очень много красивых и современных мест. Главным достояние Адлера является Олимпийский парк. Территория очень большая, на входе вам сразу предложат экскурсию на электрокаре (300 рублей с человека). Вы увидите такие здания как: стадион &ldquo;Фишт&rdquo; &ndash; построенный специально к чемпионату мира по футболу, два ледовых дворца &ndash; построенных к зимней олимпиаде, так же трассу &ldquo;Формулы - 1&rdquo;.&lt;/p&gt;&lt;p&gt;Есть возможность не только посмотреть на эти сооружения, но и побывать внутри. Нужно только приобрести билет (футбол/хоккей/гонка Формулы-1) или покататься на коньках в тренировочном центре.&lt;/p&gt;&lt;p&gt;Вечером в Олимпийском парке начинается представление поющих фонтанов. В зависимости от времени года, начало представления меняется: лето &ndash; начало в 20:30, осень/весна &ndash; начало в 19:00, зима &ndash; начало в 18:00&lt;/p&gt;&lt;p&gt;Посещение Олимпийского парка бесплатно.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.5 Сочи парк&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/1.5.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Самый большой парк аттракционов в России! Первый в стране тематический парк, но если говорить чем он может удивить еще, то это 28 гектаров территории, с большим количеством разнообразных аттракционов, которые подойдут всем посетителям.&lt;/p&gt;&lt;p&gt;Самыми главными аттракционами являются:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Квантовый скачок &ndash; максимальная скорость 105км/ч&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Змей Горыныч &ndash; протяженность трассы 1056 метров&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Жар-птица &ndash; стела высотой 65 метров&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Вечный двигатель &ndash; футуристический маятник&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;На территории парка расположены кафе и сувенирные лавки. Если вам не интересны аттракционы, то можно посетить дельфинарий, цирк и еще много другого.&lt;/p&gt;&lt;p&gt;Для того чтобы посетить парк, нужно всего лишь приобрести входной билет и кататься на всех аттракционах, смотреть все шоу (любое количество раз за день). Цены на билеты:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 2200 рублей &ndash; взрослый билет&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1900 рублей &ndash; детский билет&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 300 рублей &ndash; льготный/день рождение (требуются дополнительные документы)&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Так же у парка есть дополнительное предложение скороход, позволяющий &lt;/p&gt;&lt;p&gt;проходить на все аттракционы без очереди, цента такой услуги 3500 рублей (приобретается дополнительно к входному билету)&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2 &ndash; Заведения&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Вы находитесь на берегу черного моря и в одном из самых крупных курортных мест в России. Конечно, заведений куда нужно сходить в Адлере очень много. Опять же, все места мы описывать не будем, но отметим те, которые обязательно стоит посетить.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.1&lt;/strong&gt; &lt;strong&gt;У Рыбака&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.1.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ресторан &ldquo;У Рыбака&rdquo; находится на небольшом расстоянии от Олимпийского парка. Это очень уютное заведение с прекрасным видом на море. Можно посидеть как на улице, так и внутри. Заведение, как и подобает ресторанам очень уютное, а самое главное доступное по ценам.&lt;/p&gt;&lt;p&gt;Еще одним из плюсов является наличие детской комнаты, что позволяет прийти сюда всей семьей и отлично провести время. В ресторане вас ожидают приветливые и вежливые официанты, свежие морепродукты и профессиональные повара.&lt;/p&gt;&lt;p&gt;Как мы уже говорили, цены в ресторане приемлемые. Средний чек на человека составляет 1000 рублей (что не много, при учете что рядом море и Олимпийский парк). Самое главное верно рассчитать свои силы, так как порции не маленькие и есть вероятность, что вы закажете больше, чем сможете съесть.&lt;/p&gt;&lt;p&gt;Обязательно к посещению!&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.2 Ресторан Батоно&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.2.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ресторан Батоно &ndash; это по-настоящему грузинский ресторан, от приготовления блюд до интерьера и музыки в зале. Приходя сюда, ты попадаешь в другой мир, со своими правилами и ценностями.&lt;/p&gt;&lt;p&gt;Есть возможность расположиться или в зале, или на веранде. Обилие грузинских блюд не оставит равнодушным. Цены на удивление очень приятные, средний чек на одного человека, составляет 1000 рублей (все зависит от вашего аппетита). Вас ожидает колоритный персонал, по настоящему красивая живая музыка и конечно вкусные блюда.&lt;/p&gt;&lt;p&gt;Ресторан Батоно расположен по адресу: Адлер ул. Бестужева 1&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.3 Мята&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.3.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ресторан Мята &ndash; является по-настоящему семейным рестораном. Тут будет комфортно, как взрослым, так и детям. Большой выбор изысканных блюд, бар и роскошный зал, собранно в одном месте.&lt;/p&gt;&lt;p&gt;Детская комната поможет вам отдохнуть, а вашему ребенку весело провести время. Если шумные залы вам не интересны, то есть возможность расположится в вип-зоне. Расположен ресторан по адресу: ул. Парусная 16&lt;/p&gt;&lt;p&gt;Что касается цен, то нужно понимать, этот ресторан и цены тут выше. Средний чек на одного человека в среднем около 2500 рублей. Но поверьте, когда вы будете там находится, вы поймете, что деньги потрачены не зря, всем рекомендуем посетить это заведение.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.4 BESTUZHEV BAR&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.4.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Бар Бестужев расположено в ТЦ &ldquo;Мандарин&rdquo;. Это место не для всех, так как, это ночное заведение. Если вам наскучило море и вы хотите по настоящему &ldquo;оттянуться&rdquo;, то вам именно сюда. Бар работает каждый день и он просто пропитан &ldquo;отрывом&rdquo;.&lt;/p&gt;&lt;p&gt;Танцы на барных стойках с Bar-Girls, пожалуй лучшее Go-Go show и Perfomans show. Музыка всю ночь и танцы до упаду, но не только это готов предложить бар! Если вам громкая музыка не по душе, то вы можете отдохнуть на летней веранде.&lt;/p&gt;&lt;p&gt;Все это сделано в одном стиле, который взял в себя только лучшее из мира ночной жизни. Средний чек в заведении зависит от способа отдыха! Ориентируйтесь на сумму в 2000-3000 рублей на человека. Обязательно для посещения, если вам интересна ночная жизнь и веселье!&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.5 Бар \&quot;Смена Обстановки\&quot;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/04/05/2.5.png\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Что в вашем понимании хороший бар? Большое разнообразия пенного напитка и закусок. Все это есть в баре \&quot;Смена Обстановки\&quot;. Тут можно отдохнуть, как одному, так и большой, веселой компанией.&lt;/p&gt;&lt;p&gt;Простая, но приятная обстановка поможет расслабиться и просто наслаждаться вечером, в прекрасной компании. Очень приветливый коллектив, расскажет и посоветует, чем полакомится, а вам остается только заказать и получать удовольствие.&lt;/p&gt;&lt;p&gt;Цены в баре очень даже приемлемые, в среднем чек на одного человека не превышает 1000 рублей (все зависит от того как сильно вы отдыхаете). Если вы хотите просто отдохнуть под &ldquo;пивасик&rdquo;, то вам определенно стоит прийти именно сюда!&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Интересных, красивых и популярных мест в Адлере очень много! Большое количество экскурсий (которые чаще всего предлагают в гостиницах и отелях), позволит вам быстрее и более подробно узнать город. Если же вас интересует более подробная информация, то вы так же можете найти ее у нас на сайте https://u-gid.com &ndash; вам нужно найти только интересующий вас раздел. Всю информацию о популярных местах собрать в одной статье невозможно. Начните знакомство с Адлером по этим местам, а дальше изучайте его самостоятельно и с каждым разом он будет открывать для все больше и больше. Хорошего вам отдыха и потрясающих впечатлений!&lt;/p&gt;&quot;,
                &quot;user_id&quot;: 9,
                &quot;status&quot;: 1,
                &quot;views&quot;: 0,
                &quot;likes&quot;: 0,
                &quot;favorites&quot;: 0,
                &quot;comments&quot;: 0,
                &quot;country_id&quot;: 1,
                &quot;region_id&quot;: null,
                &quot;city_id&quot;: null,
                &quot;area_id&quot;: null,
                &quot;language_id&quot;: 1,
                &quot;company_id&quot;: null,
                &quot;category_id&quot;: 1,
                &quot;image&quot;: &quot;/attachments/2022/04/05/Куда сходить в Адлере.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-04-05 07:55:52&quot;,
                &quot;updated_at&quot;: &quot;2022-04-05 07:55:52&quot;,
                &quot;tags&quot;: &quot;null&quot;,
                &quot;seo_description&quot;: &quot;Мы собрали только лучшие места, которые вам обязательно стоит посетить по прилету в Адлер.&quot;,
                &quot;published_at&quot;: &quot;2022-04-05 07:52:37&quot;
            },
            {
                &quot;id&quot;: 28,
                &quot;is_week&quot;: false,
                &quot;is_main&quot;: false,
                &quot;title&quot;: &quot;Поездка с ребенком в Сочи&quot;,
                &quot;code&quot;: &quot;poezdka-s-rebenkom-v-sochi&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;Собираетесь на отдых с детьми? Мы поможем вам понять, есть ли возможность с комфортом отдохнуть в Сочи и будет ли интересно вашем детям. Все что нужно для отлично отдыха с детьми в Сочи, вся информация собрана специально для вас.&lt;/p&gt;&lt;p&gt;Мы разберем все нюансы в такой последовательности:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;1 &ndash; Где лучше остановиться с детьми (район Большого Сочи)&lt;/p&gt;&lt;p&gt;2 &ndash; Когда лучше ехать на отдых с детьми&lt;/p&gt;&lt;p&gt;3 &ndash; Развлечение для детей (самые популярные места)&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Так как после Олимпиады курорт Большой Сочи, не уступает курортам всего мира, не удивительно, что с каждым годом интерес к нему растет. Большинство туристов считают, что отдохнуть с детьми тут не получиться, но это совсем не так. Итак, давай те разберем, где поселиться, что посетить и куда поехать развлекаться с детьми в Сочи.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1 &ndash; Где лучше остановиться&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Более детально про каждый район Большого Сочи, мы описывали в другой статье &ndash; &ldquo;Где отдыхать и что посмотреть в Сочи&rdquo;. Для отдыха с детьми, подойдет Лазаревский и Хостинский районы. Эти районы, более спокойные, так как, тут меньше всего туристов.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Лазаревский район&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Если говорить именно о курортных поселках, то это: Аше, Лоо, Вардане, Дагомыс. Самый главный минус этого района, отдаленность от аэропорта. Дорога у вас может занять от 2 часов и более. С другой стороны это и большой плюс, так как это отпугивает многих отдыхающих, что очень положительно влияет на цены.&lt;/p&gt;&lt;p&gt;Теперь разберем пляжи, говорить тут много не придется, все пляжи этого района мелко-галечные. Есть как большие пляжи (Аше и Головинка), так и маленькие (Макопсе). Все зависит от того, какой вам пляж больше по душе.&lt;/p&gt;&lt;p&gt;Из-за отдаленности этого района, реконструкция в связи с олимпиадой и все дополнительные работы, его практически не коснулись. Большого количества туристов вы не увидите и этот район лучше всего выбирать, для спокойного семейного отдыха. Пляжи, прогулки с детьми и экскурсии, вот тот перечень, который будет вам предоставлен по самой приятной цене. Если вас не пугает долгая дорога, то рекомендуем именно Лазаревский район, вам понравится!&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Хостинский районы&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Этот район не такой популярный среди туристов, сами жители называют этот район спальным. Это самый большой плюс, так как туристов тут почти нет.&lt;/p&gt;&lt;p&gt;Добраться от аэропорта до Мацесты можно за 15-20 минут. Почти каждый городской транспорт, который едет из Адлера в Сочи, проезжает Мацесту, так что добраться до места совсем не сложно.&lt;/p&gt;&lt;p&gt;Даже при учете того, что туристов тут очень мало, есть и санатории и отвели и гостевые дома, так что отдыхающий без крыши над головой не останется. Выбор, как всегда за вами, все завит от вашего бюджета и желания.&lt;/p&gt;&lt;p&gt;Самый популярным и престижным местом в Мацесте считается оздоровительный комплекс Alean Family Resort &amp;amp; SPA Sputnik. Если вас не интересует жилье такого плана, то можно снять квартиру посуточно. Цена не большая, а выбора достаточно.&lt;/p&gt;&lt;p&gt;С пляжами в Хостинском районе тоже все просто, главный минус местных пляжей это чистота воды. Если были дожди, то на море идти нет смысла, потому что, такие реки как: Хоста, Мацеста и Кудепста берут свое начало в горных ущельях и после дождей, вода в море становиться мутной и грязной. В остальном пляжи хоть и не широкие, но места достаточно для всех. Есть как оборудованные пляжи, так и дикие, тут уже кому как нравиться.&lt;/p&gt;&lt;p&gt;Для отдыха с детьми это просто отличный вариант, так как, добраться до большинства развлечений будет не сложно.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2 &ndash; Когда лучше ехать в отпуск с детьми.&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Самое главное, это хороший отдых! Мы рекомендуем ехать поздней весной или в самом начале лета. Связано это с тем, что температура воздуха, еще не большая, в среднем 20-25 градусов. Можно не переживать о солнечном ударе или термических ожогах. Но и море еще не совсем прогрелось, так что купаться не рекомендуется. В это время года, туристов не много, сезон еще не начался, соответственно и цены еще не такие большие. Выбор мест в отелях или гостевых домах большой. Хоть до начала сезона еще есть как минимум пол месяца, заведения уже начинают свою работу, так что, чем занять ребенка придумать не сложно.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3 &ndash; Развлечения для детей (самые популярные места)&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ну а теперь, мы плавно подошли к самой большой части нашей статьи. Мы перечисли все самые популярные места, где и вам, и вашему ребенку будет весело!&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;- &lt;strong&gt;&lt;em&gt;Сочи парк&lt;/em&gt;&lt;/strong&gt;. Пожалуй самое популярное место для отдыха с ребенком. Представления, аттракционы и карусели, есть все для отдыха, как малышей, так и взрослых. А если вашего ребенка не интересуют аттракционы, то можно посетить игровые лаборатории или научные шоу, которые так же расположены на территории парка. Отдыхая в парке, можно не переживать о том, что вашему ребенку будет скучно.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;- &lt;strong&gt;&lt;em&gt;Аквапарк &ldquo;Маяк&rdquo;.&lt;/em&gt;&lt;/strong&gt; Почему именно этот прак? Все просто, он находиться прямо в центре города Сочи. Добраться до него совсем не сложно. Для отдыха с детьми, это отличный вариант, так как, тут есть 2 детских зоны отдыха, а для детей постарше и взрослых есть 5 видов горок. Помимо всего этого, парк расположен в прибрежной зоне и располагает всем необходимым для отличного отдыха.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p&gt;- &lt;strong&gt;&lt;em&gt;Дендрарий. &lt;/em&gt;&lt;/strong&gt;Если активный отдых вам и вашему ребенку не интересен, то можно полюбоваться красотами природы, на данный момент в парке насчитывается более 1800 деревьев, кустарников и разных цветов. Так же, ряды Европейских растений пополнили, растения из Японии и Америки. Посещение парка доступно каждый день, стоимость для взрослого человека 250 рублей, детский билет 120 рублей (актуальную цену лучше уточнить перед посещением). Для полного обхода парка потребуется от трех часов, так что прогулка будет интересной, но и длительной, к этому тоже нужно быть готовым.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;- &lt;strong&gt;&lt;em&gt;Дельфинарий. &lt;/em&gt;&lt;/strong&gt;Как же не отметить и это замечательное место для отдыха с ребенком. Это самый беспроигрышный вариант, так как и ребенок, и взрослые будут в восторге от этих милых созданий. Тем более, после представления с дельфинами можно сфотографироваться и оставить этот прекрасный момент в памяти ребенка!&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;- &lt;strong&gt;&lt;em&gt;Олимпийский парк. &lt;/em&gt;&lt;/strong&gt;Это место очень популярно, погулять и посмотреть тут есть на что. Самым главным пунктом в прогулке по Олимпийскому парку является, поющие фонтаны. Они работают каждый день, в зависимости от времени года, начало меняется (лето &ndash; начало в 20:30, осень/весна &ndash; начало в 19:00, зима &ndash; начало в 18:00). Так же, на территории парка, расположены такие спортивные объекты как: стадион &ldquo;Фишт&rdquo;, ледовая арена, трасса формулы-1. Все это абсолютно бесплатно, поверьте вам и вашему ребенку понравиться такая прогулка.&lt;/p&gt;&lt;p&gt;И это только малый список мест, которые можно посетить с детьми. Выбор остается за вами. Самое главное, это понять, что хотите вы и ваши дети.&lt;/p&gt;&lt;p&gt;В заключении хотим сказать, что отдохнуть в Сочи с детьми легко, а самое главное, не дорого. Главное заранее продумать когда и куда ехать, тогда это будет лучшей отдых, как для вас, так и для вашего ребенка! Хорошего вам отдыха и ярких эмоций.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&quot;,
                &quot;user_id&quot;: 9,
                &quot;status&quot;: 1,
                &quot;views&quot;: 0,
                &quot;likes&quot;: 0,
                &quot;favorites&quot;: 0,
                &quot;comments&quot;: 0,
                &quot;country_id&quot;: 1,
                &quot;region_id&quot;: null,
                &quot;city_id&quot;: null,
                &quot;area_id&quot;: null,
                &quot;language_id&quot;: 1,
                &quot;company_id&quot;: null,
                &quot;category_id&quot;: 1,
                &quot;image&quot;: &quot;/attachments/2022/03/31/Поездка с ребенком в Сочи.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-03-31 13:38:09&quot;,
                &quot;updated_at&quot;: &quot;2022-03-31 13:38:18&quot;,
                &quot;tags&quot;: &quot;&quot;,
                &quot;seo_description&quot;: &quot;Собираетесь на отдых с детьми? Мы поможем вам понять, есть ли возможность с комфортом отдохнуть в Сочи и будет ли интересно вашем детям.&quot;,
                &quot;published_at&quot;: &quot;2022-03-31 13:38:12&quot;
            },
            {
                &quot;id&quot;: 27,
                &quot;is_week&quot;: false,
                &quot;is_main&quot;: false,
                &quot;title&quot;: &quot;Топ 10 ошибок в отпуске&quot;,
                &quot;code&quot;: &quot;top-10-oshibok-v-otpuske&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;Каждый человек хочет отдохнуть так, чтобы было что вспомнить. Но ведь для каждого человека, понятие отдых разное. Именно поэтому мы разберем самые главные ошибки, которые могу испортить даже самый идеальный отпуск.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1 &ndash; Экономия на билеты.&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Да если экономия &ldquo;здоровая&rdquo;, то в этом не чего плохого нет, но если разница в ценах не очень большая, то нет смысла ухудшать качество или удобность перелета. Всегда стоит брать в расчет, что дешевый способ может стать еще большей проблемой (задержка рейса при пересадке, дополнительные расходы и т.д.), чем прямой но чуть более дорого маршрут.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2 &ndash; Путешествие без страховки&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Это самая популярная ошибка. Что может случиться со мной в отпуске? Зачем мне платить еще и за страховку? Опытные путешественники утверждают, что выгоднее оформить страховку (происходит это очень быстро), чем оплачивать лечение на отдыхе. Даже самый просто укол может обойтись вам в кругленькую сумму. Так что над этим вопросом, стоит очень хорошо подумать при планировании отдыха.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3 &ndash; Обмен наличных в аэропорту&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;При путешествии за границей, многие ошибочно обменивают наличные в аэропорту. Этого не стоит делать, так как в аэропорту очень невыгодный курс для путешественника. Лучше обменять сумму необходимую сумму на дорогу до гостиницы и уже там обменять оставшиеся деньги по более выгодному курсу.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;4 &ndash; Сдавать все сумки с вещами в багаж&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;В последнее время вопрос о утери багажа, всплывает не так часто, но такая проблема все еще остается. Вещи первой необходимости лучше положить в ручную кладь. Ведь если такая ситуация произойдет и ваши вещи будут утеряны, то вам не придется бегать и покупать необходимые принадлежности по высокой цене.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;5 &ndash; Компания&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Компания на отдыхе, что может быть лучше? Это не совсем так, как уже говорилось, для каждого человека понятие отдых разное. Для кого то, это постоянные прогулки и экскурсии, для кого то это отдых на пляже, а кому то нужен только бар. При планирование отдыха, лучше сразу обговорить все маршруты, чтобы в дальнейшем избежать обид и недовольств.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;6 &ndash; Фото, очень много фото!&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;В поездке, очень много моментов которые хочется запечатлеть. К этому вопрос нет, но бывают такие ситуации, когда мы становимся заложниками красивых снимков. Мы рекомендуем, хотя бы иногда убирать камеру подальше и просто наслаждаться красивыми видами. Это ваш отпуск эмоции и воспоминание, лучшее что вы можете от него получить.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;7 &ndash; Жилье&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;В настоящее время, очень просто проверить, понять и подобрать жилье онлайн. Очень много онлайн площадок предоставляют такую возможность. Но до сих пор, люди прилетают и только тогда занимаются вопросом проживания. В таком случае, выбирать уже не приходиться и очень часто, отдыхающий переплачивает за не самый хорошей отель или квартиру.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;8 &ndash; Уважай обычаи и традиции&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Перед тем как посетить любую страну, лучше изучить, что можно делать или нельзя. Например, в Сингапуре очень чистые улицы и за брошенный мусор, вас могу оштрафовать на приличную сумму. В Турции, самый безобидный на первый взгляд жест из двух сложенных пальцев, является очень оскорбительным. Самое главное помнить, что вы в первую очередь гость и стоит уважительно относиться к традициям или обычаям.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;9 &ndash; Сувениры&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ой, да у меня еще полно времени, потом куплю! Это самая распространённая ошибка почти каждого туриста. В последний день бегать и скупать все что попадется, не лучший вариант. Если вам понравилась какая то вещь, купите ее сразу. В таком случае и вы не потеряете заветный день отдыха, и сувениры для всех будут уже куплены.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;10 &ndash; Ходить в кафе рядом с гостиницей&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Чем ближе туристическое место, тем дороже там еда! Перед тем как пойти перекусить, лучше проверить, а стоит ли идти в ближайшее место. Возможно, рядом есть места с более вкусной кухней и по более приятным ценам. Очень много форумов, где люди делятся своими впечатлениями о кафе и ресторанах, стоит ознакомиться и уже тогда, вкусно и не дорого покушать.&lt;/p&gt;&lt;p&gt;На самом деле, это только советы. Каждый сам решает, как оно проведет свой отпуск. Продумывайте все детали и тогда это будет самый незабываемый отдых в вашей жизни!&amp;nbsp;&lt;/p&gt;&quot;,
                &quot;user_id&quot;: 9,
                &quot;status&quot;: 1,
                &quot;views&quot;: 0,
                &quot;likes&quot;: 0,
                &quot;favorites&quot;: 0,
                &quot;comments&quot;: 0,
                &quot;country_id&quot;: 1,
                &quot;region_id&quot;: null,
                &quot;city_id&quot;: null,
                &quot;area_id&quot;: null,
                &quot;language_id&quot;: 1,
                &quot;company_id&quot;: null,
                &quot;category_id&quot;: 1,
                &quot;image&quot;: &quot;/attachments/2022/03/31/Топ 10 ошибок в отпуске.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-03-31 13:35:02&quot;,
                &quot;updated_at&quot;: &quot;2022-03-31 13:35:02&quot;,
                &quot;tags&quot;: &quot;null&quot;,
                &quot;seo_description&quot;: &quot;Мы разберем самые главные ошибки, которые могу испортить даже самый идеальный отпуск.&quot;,
                &quot;published_at&quot;: &quot;2022-03-31 13:32:59&quot;
            },
            {
                &quot;id&quot;: 23,
                &quot;is_week&quot;: true,
                &quot;is_main&quot;: false,
                &quot;title&quot;: &quot;Семейный отдых в Санкт-Петербурге&quot;,
                &quot;code&quot;: &quot;semeyniy-otdih-v-sankt-peterburge&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Прекрасный город на реке Ниве - Санкт-Петербург, каждый раз открывается с новой стороны для гостей северной столицы России. Самое главное, что всегда есть куда сходить и на что посмотреть! Единственной проблемой остается только малое количество времени для просмотра достопримечательностей города.&lt;/p&gt;&lt;p&gt;Если вы приехали в Питер всей семьей и не знаете куда сходить с детьми, то эта статья именно для вас. Мы постарались собрать информацию о местах, где будет интересно вам и ребенку, а так же где покушать и конечно развлечься. Разбили подборку мы по следующим разделам:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Достопримечательности&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Кафе/Рестораны&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Развлечения&lt;/p&gt;&lt;p&gt;Оговоримся сразу, это не весь список всевозможного досуга для вас и ваших детей, а только часть. Более подробно всю информацию вы можете просмотреть у нас на сайте и подобрать те варианты которые вам больше всего подойдут. Сделать вы можете это тут -u-gid.com. Переходите на сайт, выбирайте интересующий вас город и планируйте свое путешествие заранее!&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1 &ndash; Достопримечательности&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Все мы прекрасно понимаем, что долгие прогулки не совсем интересны детям и тут стоит задуматься, что именно интересно ребенку и что он готов слушать и изучать. Начнем мы с достопримечательностей, которые обязательно стоит посетить с ребенком.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.1&amp;nbsp;&amp;nbsp;&amp;nbsp; Парк Екатерингоф&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/3.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Екатерингоф - пейзажный парк в Петербурге, объект &rlm;культурного наследия страны. Расположен в юго-западной части города на Неве. Это тихое &rlm;место, в котором можно отдохнуть на лоне &rlm;природы. В парке &rlm;оборудованы площадки &rlm;для детей, в прудах плавают &rlm;утки, есть коробки для футбола, волейбола, теннисный корт. Сотрудники конноспортивной школы катают детей по аллеям и дорожкам парка на лошадях. Скамейки, сцена, пруд, тенистые ивы и покой &ndash; вот то, что вы здесь найдёте. Парк обязательно понравиться вашему ребенку и вам. Летом парк очень зеленый и приятный для прогулки, а вход в парк абсолютно бесплатный.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.2 Центральный музей связи Александра Попова&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/4.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Центральный музей связи &rlm;имени А. С. Попова &rlm;&ndash; научно-технический музей, основанный &rlm;в 1872 году. Его &rlm;экспозиция посвящена истории развития &rlm;различных видов связи, начиная от телеграфа и заканчивая космической &rlm;связью. В архивах музея хранится &rlm;одна из &rlm;ㅤ самых крупных &rlm;коллекций почтовых марок в мире, которая насчитывает &rlm;более 4 миллионов &rlm;экземпляров. Какой ребенок устоит перед космосом и техникой? Обязательно к посещению с детьми, да и взрослым тут тоже будет интересно.&lt;/p&gt;&lt;p&gt;Стоимость: Взрослые &mdash; 300 руб. Школьники, студенты, учащиеся, пенсионеры (при предъявлении подтверждающих документов) &mdash; 200 руб. Дошкольники (дети от 3 до &rlm;7 лет) &mdash; 50 руб.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.3 Музей &rlm;обороны и &rlm;блокады Ленинграда&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/5.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Экспозиции музея рассказывают о его &rlm;истории &mdash; создании, ликвидации и возрождении &rlm;в 1989 году. В 1995 году, к 50-летию &rlm;Победы была &rlm;ㅤ открыта постоянная &rlm;экспозиция, посвященная истории &rlm;обороны и &rlm;блокады Ленинграда. В &rlm;больших залах &rlm;размещено множество &rlm;стендов, рассказывающих о &rlm;жизни города &rlm;во время &rlm;войны.&lt;/p&gt;&lt;p&gt;Время работы: экскурсии &rlm;ежедневно, кроме вторника, в &rlm;ㅤ 11:00, 13:30 и 16:00. Аудио экскурсии &rlm;ежедневно, кроме вторника, в &rlm;10:00, 12:30 и 15:00. Вторник &mdash; выходной день. Касса &rlm;закрывается на час раньше. Последняя &rlm;среда каждого &rlm;месяца &mdash; санитарный &rlm;день (музей &rlm;закрыт).&lt;/p&gt;&lt;p&gt;Стоимость: билет для &rlm;взрослых с экскурсией &mdash; 400 рублей. Билет &rlm;для взрослых &rlm;с аудио экскурсией &rlm;&mdash; 300 рублей. Для школьников, студентов &rlm;и пенсионеров &mdash; 200 рублей. Для детей &rlm;до 7 лет &rlm;&mdash; бесплатно&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.4 Музей железных дорог России&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/6.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Музей железных дорог России &mdash; один из крупнейших в Европе. Огромное количество экспонатов подвижного состава, мультимедийных и интерактивные инсталляции. В музее проходят экскурсии и детские программы, а также возможно попробовать себя в роли машиниста на реалистичном тренажере. Очень популярное место для отдыха с детьми. Обязательно стоит посетить и развлечься как вам, так и ребенку.&lt;/p&gt;&lt;p&gt;Время работы: пн, чт&ndash;вс 10:00&ndash;18:00, ср 12:30&ndash;20:30. Вход посетителей заканчивается за час до закрытия музея.&lt;/p&gt;&lt;p&gt;Стоимость: от 200 руб. Льготные билеты 100 руб.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.5 Военно-исторический музей артиллерии в Санкт-Петербурге&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/7.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Это один из старейших музеев в Северной столице. Сегодня в музее представлена огромная коллекция, включающая в себя более 850 тысяч экспонатов, среди которых несколько сотен пушек демонстрируются во дворе музея, а также множество ракетных комплексов, САУ. Каждому ребенку хочется посмотреть на военную технику, так что этот вариант досуга беспроигрышный!&lt;/p&gt;&lt;p&gt;Время работы: С 11:00 до 18:00, касса работает до 17:00. Выходные дни: понедельник, вторник и последний четверг каждого месяца&lt;/p&gt;&lt;p&gt;Стоимость: взрослые &mdash; 400 рублей. Дети от 7 до 18 лет &mdash; 200 рублей. Дети до 7 лет &mdash; бесплатно. Пенсионеры &mdash; 200 рублей&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2 &ndash; Кафе и рестораны&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Прогулки &ndash; прогулками, но ведь и нужно подкрепиться! Точной рекомендации тут дать сложно, так как у каждого свои предпочтения. На самом деле вариантов в Питере где можно вкусно покушать, а самое главное угодить всем, большое количество. В этой статье мы отметили те места, где есть детское меню и детская комната, чтобы и вам и вашему ребенку было комфортно.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.1 KorovaBar&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/9.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;KorovaBar &ndash; это мясной бар-ресторан, в котором как и полагается упор сделан на блюда из мяса. Очень приятный интерьер (с применением шкуры животных) и уютная атмосфера позволяет расслабится и насладиться отдыхом.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Вам готовы предложить разнообразную винную карту (более 60 наименований вина), есть так же крепкий алкоголь и коктейли. К напиткам вы можете заказать блюда из мяса (горячие блюда и холодные закуски) и блюда итальянской кухни.&amp;nbsp;&lt;/p&gt;&lt;p&gt;В заведении два зала (в одном из них обустроена детская комната), что позволит вам прийти сюда всей семьей и каждый гость (даже самый маленький) будет доволен. Средний чек на одного человека составляет примерно 1500 рублей (все зависит от вашего аппетита).&amp;nbsp;&lt;/p&gt;&lt;p&gt;KorovaBar ждет своих гостей по адресу: пр. Московский 97&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.2 Пряности &amp;amp; Радости&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/10.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ресторан наполнен атмосферой тепла и уюта, благодаря деталям интерьера и панорамным окнам. Вы сможете расположиться на стульях с мягкими подушками или на уютных диванах и насладиться многообразием грузинской кухни.&lt;/p&gt;&lt;p&gt;Пышные хачапури и сытные хинкали никого не оставят равнодушным. В меню &laquo;Пряностей и радостей&raquo; можно встретить и русские блюда, и европейскую классику.&lt;/p&gt;&lt;p&gt;В ресторане регулярно проходят мастер-классы для детей, встречи с известными людьми, бранчи и другие активности. Средний чек на одного человека составляет примерно 2000 рублей (все зависит от вашего аппетита).&amp;nbsp;&lt;/p&gt;&lt;p&gt;Адрес ул. Малая Посадская 3&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.3 Villaggio&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/11.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ресторан подойдет для посещения всей семьей.&lt;/p&gt;&lt;p&gt;Для детей есть отдельная игровая комната и позиции в меню. Гостям предлагают огромный выбор итальянских блюд, а также напитки представлены итальянскими винами, крепкими позициями и легкими коктейлями.&lt;/p&gt;&lt;p&gt;Средний чек на одного человека составляет примерно 1500 рублей (все зависит от вашего аппетита).&amp;nbsp;&lt;/p&gt;&lt;p&gt;Адрес пер. Тучков 11&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.4 Семейный ресторан Грильяж&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/12.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Уютная атмосфера семейного ресторана позволит вам отдохнуть после тяжелого дня. В основном меню состоит из грузинских блюд, но также вы сможете найти блюда и угощения для маленьких гостей.&lt;/p&gt;&lt;p&gt;Средний чек на одного человека составляет примерно 1000 рублей (все зависит от вашего аппетита).&amp;nbsp;&lt;/p&gt;&lt;p&gt;Адрес В.О. 26-я линия 15 лит. Б&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.5 Баязет&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/13.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Рестораны в старинных особняках заслуживают особого внимания.&amp;nbsp; В &ldquo;Баязет&rdquo; имеется свой причал и сад для прогулок. Три зала ресторана оснащены для проведения мероприятий различного формата, масштаба и тематики.&lt;/p&gt;&lt;p&gt;Меню представлено из восточной, европейской и русской кухонь. В барной карте представлен внушительный выбор вин Старого Света. Если у вас деловая встреча можно разместиться в вип-кабинете с отделкой из красного дуба и мебелью ручной работы, а далее перейти в более камерный зал в стиле &laquo;лофт&raquo;.&lt;/p&gt;&lt;p&gt;Для детей имеется детская комната и няни, которые будут играть с детьми, пока вы приятно проводите время. Средний чек на одного человека составляет примерно 1500 рублей (все зависит от вашего аппетита).&amp;nbsp;&lt;/p&gt;&lt;p&gt;Адрес: наб. реки Фонтанки 112&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3 &ndash; Развлечения&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Ну и конечно просто нельзя уехать из северной столицы и не оторваться вместе с ребенком в развлекательном парке или пропустить посещение зоопарка. Для больших и самое главное приятных воспоминаний ребенка, стоит пройтись по тем местам которые мы указали ниже.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.1 Аквапарк &laquo;Питерленд&raquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/15.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Аквапарк &laquo;Питерлэнд&raquo; тематический и посвящен пиратской теме, а самое главное есть уникальные горки в аквапарке. Для занятий дайвингом имеется бассейн глубиной шесть метров. Есть школа серфинга, а загорать также можно на открытой террасе на первой линии Финского залива. Для посещение с ребенком одно из лучших мест в Питере, тем более погодные условия и время года совсем не важно.&lt;/p&gt;&lt;p&gt;Время работы: Ежедневно, кроме понедельника, с 10:00 до 22:30. Понедельник с 15:00 до 22:30.&lt;/p&gt;&lt;p&gt;Стоимость: уточнить в кассах аквапарка&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.2 Аквапарк &laquo;Родео Драйв&raquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/16.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Аквапарк &ldquo;Родео драйв&rdquo; считается семейным аквапарком, где можно безопасно отдохнуть и вам никто не будет мешать. В вечернее время свет в аквапарке практически отключают и бассейны красиво подсвечиваются, такая подсветка создаете очень хорошую атмосферу. Атмосфера и впечатления будут греть душу вам и вашему ребенку, еще очень долгое время. Обязательно посетите всей семьей &ldquo;Родео Драйв&rdquo;, жалеть непридётся.&lt;/p&gt;&lt;p&gt;Время работы: по будним дням с 10:00 до 11:00, по выходным с 09:00 до 10:00&lt;/p&gt;&lt;p&gt;Стоимость: уточнить в кассах аквапарка&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.3 Дельфинарий в Санкт-Петербурге&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/17.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Зрители смогут полюбоваться красотой, ловкостью и сообразительностью животных, услышать песни белых китов, увидеть выступление моржа. С собой можно приносить фотоаппараты и фотографировать животных со своих мест. Продолжительность представления 1 час.&lt;/p&gt;&lt;p&gt;Дельфинарий доставит &ldquo;море&rdquo; впечатлений и удовольствия вам и вашему ребенку. Если у вас нет планов, то сюда стоит сходить.&lt;/p&gt;&lt;p&gt;Время работы: ежедневно, 10:00-19:00. Пн, Вт &mdash; профилактические дни. График шоу необходимо проверять на сайте. До трех представлений в день.&lt;/p&gt;&lt;p&gt;Стоимость: для взрослого - от 400 руб.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.4 Диво-остров&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/18.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ну какой ребенок откажется от посещения парка аттракционов? Аттракционы представлены и для самых маленьких, и для тех, кто любит острые ощущения. Если захотите перекусить, загляните в открытое кафе (яблоками в карамели, попкорном, хот-догами). Украшают парк красочные фигуры сказочных персонажей. Порадуют посетителей и белочки, которые встречаются в парке на каждом шагу.&lt;/p&gt;&lt;p&gt;Время работы: Ежедневно, аттракционы и кафе: будни: с 11:00 до 22:00, сб-вс: с 11.00 до 23.00, экстремальные аттракционы начинают работать на два часа позже.&lt;/p&gt;&lt;p&gt;Стоимость: Вход в парк бесплатный.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;3.5 Ленинградский зоопарк&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/28/19.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Ленинградский зоопарк &ndash; один из самых старых зоопарков в России. Этим объясняются его сравнительно небольшие размеры и расположение в историческом центре города. Самое правильное время для похода в зоопарк &ndash; это время кормления и прогулок с животными. На официальном сайте висит расписание. В это время вы гарантированно увидите животных, которые не будут спать или прятаться от посетителей. Но имейте в виду, что сцены кормления хищников могут понравиться не всем. И уж точно такое зрелище не подходит для детей, но посмотреть на животных точно понравится всем!&lt;/p&gt;&lt;p&gt;Время работы: ежедневно с 10:00 до 17:00. Кассы закрываются на час раньше&lt;/p&gt;&lt;p&gt;Стоимость: взрослые &mdash; 600 рублей, студенты государственных высших учебных заведений, учащиеся колледжей, лицеев, техникумов РФ (дневное отделение) &mdash; 300 рублей, школьники от 7 до 18 лет&mdash; 200 рублей, дети до 7 лет &mdash; бесплатно, пенсионеры &mdash; 300 рублей.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Как мы и говорили ранее, мы собрали далеко не все места в Санкт-Петербурге, которые можно посетить как самому, так и со своей семьей или ребенком. Для получения более подробной информации о том или ином месте, вы можете зайти на наш сайт в интересующий вас раздел и посмотреть все подробно на u-gid.com. Переходите на сайт, выбирайте интересующий вас город и планируйте свое путешествие заранее!&lt;/p&gt;&lt;p&gt;Хорошего вам отдыха и ярких впечатлений!&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&quot;,
                &quot;user_id&quot;: 9,
                &quot;status&quot;: 1,
                &quot;views&quot;: 0,
                &quot;likes&quot;: 0,
                &quot;favorites&quot;: 0,
                &quot;comments&quot;: 0,
                &quot;country_id&quot;: 1,
                &quot;region_id&quot;: null,
                &quot;city_id&quot;: null,
                &quot;area_id&quot;: null,
                &quot;language_id&quot;: 1,
                &quot;company_id&quot;: null,
                &quot;category_id&quot;: 1,
                &quot;image&quot;: &quot;/attachments/2022/03/28/1.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-03-28 08:30:09&quot;,
                &quot;updated_at&quot;: &quot;2022-03-31 13:31:34&quot;,
                &quot;tags&quot;: &quot;&quot;,
                &quot;seo_description&quot;: &quot;Если вы приехали в Питер всей семьей и не знаете куда сходить с детьми, то эта статья именно для вас. Мы постарались собрать информацию о местах, где будет интересно вам и ребенку, а так же где покушать и конечно развлечься&quot;,
                &quot;published_at&quot;: &quot;2022-03-31 13:30:45&quot;
            },
            {
                &quot;id&quot;: 26,
                &quot;is_week&quot;: false,
                &quot;is_main&quot;: false,
                &quot;title&quot;: &quot;Сколько стоит отдохнуть в Сочи?&quot;,
                &quot;code&quot;: &quot;skolyko-stoit-otdohnuty-v-sochi&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;Сочи &ndash; курортный город России. В последние два года, очень популярное место для отдыха, как минимум из за доступности посещения данного города. Так как в рамках страны ограничения из за короновирусной инфекции не такие жесткие. В этой статье мы расскажем, сколько будет стоить отдохнуть в Сочи. Цены которые будут указаны усредненные, то есть можно провести отдых как дороже, так и дешевле. Уточняйте суммы перед самим отпуском повторно. Разбирать будем следующие пункты:&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Дорога&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Проживание&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Питание&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Начнем с того что до Сочи нужно добраться. Сделать это можно как воздушным, так и наземным транспортом. Напоминаем, что аэропорт расположен в Адлере и если вы хотите проживать в Сочи, то нужно учитывать и дополнительную дорогу с аэропорта до места проживания. Точную сумму указать именно на дорогу нет возможности, так как маршрутов очень много, так что в этом плане лучше воспользоваться самыми доступными маршрутами (горячие билеты/ акции и т.д.). Поезд так же может доставить вас до райского города России, но поездка таким способом увеличивает время которое вы проведете в дороге. Здесь уже кому как удобнее.&lt;/p&gt;&lt;p&gt;Передвижение по самому городу в среднем 28 рублей на автобусе (одна поездка). Такси гораздо дороже, в самый разгар туристического сезона такси стоит в среднем от 250 до 350 рублей (все зависит от дальности маршрута). Есть возможность взять автомобиль в аренду, в среднем такая услуга в сутки стоит 2300 рублей.&lt;/p&gt;&lt;p&gt;А теперь уже более детально и с примерными суммами.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Проживание&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;В этом вопросе, лучше начать с того, какой отдых вам интересе больше всего. Если вы хотите посетить как можно больше красивых мест, то вам лучше располагаться ближе к центру города (ж/д Вокзал), так как вам легче будет продумать маршрут (с центра города можно добраться практически куда угодно). Если ваша цель море и только море, то искать жилье лучше именно рядом с морем, но в таком случае и цена будет выше. В Сочи очень простое правильно, чем ближе море тем дороже квартира или отель. Давай разбирать подробнее.&lt;/p&gt;&lt;p&gt;1 &ndash; Хостел. Это самый простой а самое главное дешевый вариант. Койка-место в хостеле стоит примерно 550-700 рублей. Если вам нужен двухместный номер то цена будет выше, средняя цена такого номера в районе 2500 рублей.&lt;/p&gt;&lt;p&gt;2 &ndash; Отель. Если хостел вам не интересен, то возможно этот вариант будет именно для вас. В городе очень большое количество отелей на любой вкус и кошелек, нужно только подобрать свой. Если вам подойдет стандартный отель, то номер обойдется вам примерно в 3500 рублей/сутки. Отели четыре звезды уже будет дороже, номер в таком отеле стоит от 4000 рублей и выше. Ну и отели класса люкс стоят за сутки от 10000 рублей и более.&lt;/p&gt;&lt;p&gt;3 &ndash; Квартиры и апартаменты. Самый распространённый вариант проживания в Сочи, это посуточные квартиры. Средняя цена квартиры составляет 2000 рублей за сутки. Только выбирая квартиру нужно быть очень внимательным, так как, многие люди которые сдают квартиры, либо завышают цену и клиент получает не совсем то на что рассчитывал, либо расположение квартиры находиться совсем не в том районе как было указано в объявлении. И самое главное, не стоит искать квартиру по приезду в город и тем более снимать ее у людей которые стоят у авто и ж/д вокзала (цены высокие, а удобства не самые лучшие).&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Питание&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Кто не любит вкусно и недорого покушать? Сочи сможет удовлетворить как искушенного гурмана, так и простого отдыхающего, так как заведений питания в городе большое количество.&lt;/p&gt;&lt;p&gt;Все заведения такого плана делятся на несколько типов:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - недорогие. Столовые, закусочные и маленькие кафе. Средний чек на одного человека в таких заведениях 400-500 рублей. Поверьте хоть ценна и небольшая, но вкусной еды будет очень даже много.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - средние. Это уже обычное кафе, пиццерии и небольшие рестораны. Разнообразия блюд становиться больше, но и ценна на одного человека возрастает. Средний чек примерно 1000 рублей.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - дорогие. Это либо рестораны разной кухни, либо кафе у моря и т.д. Большой выбор морепродуктов, кухни разных стран и конечно же мясные блюда. Средний чек только на блюда составит от 1500 рублей на человека. Но кто будет кушать такие блюда и без напитков? Именно они и прибавляют к вашему чеку от 2000 рублей на человека.&lt;/p&gt;&lt;p&gt;Если же вы снимаете квартиру и у вас есть кухня, то можно спокойно покупать продукты в супермаркетах или на рынках.&lt;/p&gt;&lt;p&gt;Идеальный отдых каждый представляет себе по-своему. Для кого-то просто необходимо ходить по фешенебельным ресторанам и пафосным клубам, устраивать себе роскошный шопинг, ездить на дорогие экскурсии. А другие будут счастливы от ежедневных походов на пляж, прогулок по набережной, встреч рассветов и закатов, уличной еды, поездок на автобусе на соседний курорт.&lt;/p&gt;&lt;p&gt;Если же брать среднюю сумму, которая необходима одному человеку на отдых в Сочи, то она примерно составляет 3000 &ndash; 5000 рублей в сутки (это и проживание, питание, отдых). Всем хорошего отдыха и приятных впечатлений.&lt;/p&gt;&quot;,
                &quot;user_id&quot;: 9,
                &quot;status&quot;: 1,
                &quot;views&quot;: 0,
                &quot;likes&quot;: 0,
                &quot;favorites&quot;: 0,
                &quot;comments&quot;: 0,
                &quot;country_id&quot;: 1,
                &quot;region_id&quot;: null,
                &quot;city_id&quot;: null,
                &quot;area_id&quot;: null,
                &quot;language_id&quot;: 1,
                &quot;company_id&quot;: null,
                &quot;category_id&quot;: 1,
                &quot;image&quot;: &quot;/attachments/2022/03/31/Сколько стоит отдохнуть в Сочи.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-03-31 13:30:40&quot;,
                &quot;updated_at&quot;: &quot;2022-03-31 13:30:40&quot;,
                &quot;tags&quot;: &quot;null&quot;,
                &quot;seo_description&quot;: &quot;Цены которые будут указаны усредненные, то есть можно провести отдых как дороже, так и дешевле. Уточняйте суммы перед самим отпуском повторно&quot;,
                &quot;published_at&quot;: &quot;2022-03-31 13:28:26&quot;
            },
            {
                &quot;id&quot;: 25,
                &quot;is_week&quot;: false,
                &quot;is_main&quot;: true,
                &quot;title&quot;: &quot;Где отдыхать и что посмотреть в Сочи&quot;,
                &quot;code&quot;: &quot;gde-otdihaty-i-chto-posmotrety-v-sochi&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;&lt;strong&gt;Где отдыхать и что посмотреть в Сочи?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Перед тем, как рассказать где лучше отдыхать в Сочи, нужно уточнить тот факт, что протяженность курорта Сочи составляет 140 километров вдоль моря. Для людей которые едут отдыхать в Сочи первый раз, могут запутаться в выборе места. Каждый район, по своему особенный. Большой Сочи делиться на четыре административных района: Адлерский, Центральный, Хостинский, Лазаревский, но так же есть и маленькие районы: Красная поляна, Мамайка, Кудепста и т.д. Об этом и будет наша статья, где лучше отдыхать и что посетить в Большом Сочи.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1. Где лучше отдыхать в Сочи?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Для каждого туриста, понятие отдых свое! Кому-то нужно &ldquo;тусить&rdquo;, кому-то нужен семейных отдых на пляже, а для кого то это посещение всевозможных музеев и экскурсий. Сказать какой именно вам подойдет отдых мы не можем, но есть возможность описать каждый район и его преимущества.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Лазаревский район&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Начнем, наверное с самого протяженного района большого Сочи. Если говорить именно о курортных поселках, то это: Аше, Лоо, Вардане, Дагомыс. Самый главный минус этого района, отдаленность от аэропорта. Дорога у вас может занять от 2 часов и более. С другой стороны это и большой плюс, так как это отпугивает многих отдыхающих, что очень положительно влияет на цены.&lt;/p&gt;&lt;p&gt;Раз мы заговорили про цены, то каждый турист найдет для себя место для проживания, отталкиваясь от своего кошелька. Перечислять ценовый диапазоны мы не будем так как, мест для отдыха в этом районе очень большое количество, мы просто перечислим для каждой ценовой категории места, а вы уже делайте выбор.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;em&gt;Бюджетные места: &lt;/em&gt;&lt;/strong&gt;Отель &rdquo;Море&rdquo;(расположен в Вардане), Гостевой дом Helas или Chernoye More.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;em&gt;Средний ценовой диапазон: &lt;/em&gt;&lt;/strong&gt;Отели: Оскар, Двин, Олимпия, ВатерЛоо, Созвездие, &lt;/p&gt;&lt;p&gt;Villa Liran.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;em&gt;Премиальный диапазон цен: &lt;/em&gt;&lt;/strong&gt;Прометей Клуб All Inclusive, Оздоровительный Комплекс Дагомыс.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Теперь разберем пляжи, говорить тут много не придется, все пляжи этого района мелко-галечные. Есть как большие пляжи (Аше и Головинка), так и маленькие (Макопсе). Все зависит от того, какой вам пляж больше по душе.&lt;/p&gt;&lt;p&gt;Из-за отдаленности этого района, реконструкция в связи с олимпиадой и все дополнительные работы, его практически не коснулись. Большого количества туристов вы не увидите и этот район лучше всего выбирать, для спокойного семейного отдыха. Пляжи, прогулки с детьми и экскурсии, вот тот перечень, который будет вам предоставлен по самой приятной цене. Если вас не пугает долгая дорога, то рекомендуем именно Лазаревский район, вам понравится!&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Центральный Сочи&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Центральный Сочи, это место где собрано все самое лучшее! Дорогие отели, рестораны, магазины и исторические музеи. Оговоримся сразу, не всем отдыхающим тут понравится, так как туристов в городе очень много, но разберем по порядку.&lt;/p&gt;&lt;p&gt;Добраться до города из аэропорта не сложно. Автобусы, такси и электрички вам в этом помогут. В среднем дорога до Сочи займет 30 минут.&lt;/p&gt;&lt;p&gt;Выбрать место для отдыха тут тоже очень просто, отелей и гостевых домов в большом количестве. Главное подобрать под свой бюджет, чем ближе к морю, тем дороже. При выборе жилья советуем пользоваться проверенными ресурсами, так как, отдыхающих еще на вокзале встречают зазывалы, которые сдают квартиры посуточно, обращаться к ним не стоит, цена высокая, а условия далеко не лучшие.&lt;/p&gt;&lt;p&gt;Из-за большого количества туристов, цены и в городе очень большие, развлечения и питание обойдется гораздо дороже чем в других районах. По Сочи очень легко передвигаться пешком, все самые интересные места, находятся в шаговой доступности (об этом мы расскажем позже в статье).&lt;/p&gt;&lt;p&gt;Что касается пляжей, они в Сочи узкие и разделены на участки с помощью волнорезов. Большое количество кафе и сувенирных магазинов делают их еще меньше. Как мы уже говорили ранее, туристов в городе очень много, поэтому пляжи стоит посещать в утреннее время или выбирать платные пляжи.&lt;/p&gt;&lt;p&gt;Данный район, подойдет для тех, кто хочет &ldquo;оторваться&rdquo; или приехал по делам. Близкое расположение всех достопримечательностей позволяет посетить все за пару дней. Так же этот район подойдет и для тех кто приехал на шопинг. Для семейного отдыха этот вариант не самый лучший.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Хостинский район&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Этот район не такой популярный среди туристов, сами жители называют этот район спальным. Это самый большой плюс, так как туристов тут почти нет.&lt;/p&gt;&lt;p&gt;Добраться от аэропорта до Мацесты можно за 15-20 минут. Почти каждый городской транспорт, который едет из Адлера в Сочи, проезжает Мацесту, так что добраться до места совсем не сложно.&lt;/p&gt;&lt;p&gt;Даже при учете того, что туристов тут очень мало, есть и санатории и отвели и гостевые дома, так что отдыхающий без крыши над головой не останется. Выбор, как всегда за вами, все завит от вашего бюджета и желания.&lt;/p&gt;&lt;p&gt;Самый популярным и престижным местом в Мацесте считается оздоровительный комплекс Alean Family Resort &amp;amp; SPA Sputnik. Если вас не интересует жилье такого плана, то можно снять квартиру посуточно. Цена не большая, а выбора достаточно.&lt;/p&gt;&lt;p&gt;С пляжами в Хостинском районе тоже все просто, главный минус местных пляжей это чистота воды. Если были дожди, то на море идти нет смысла, потому что, такие реки как: Хоста, Мацеста и Кудепста берут свое начало в горных ущельях и после дождей, вода в море становиться мутной и грязной. В остальном пляжи хоть и не широкие, но места достаточно для всех. Есть как оборудованные пляжи, так и дикие, тут уже кому как нравиться.&lt;/p&gt;&lt;p&gt;Этот район подойдет для тех отдыхающих, которые хотят недорого отдохнуть, но и еще подлечить здоровье.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Адлерский район&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Про рассказ о данном районе хотелось бы начать с того, что ранее это был отдельный город. Как можно понять именно в Адлере находиться единственный аэропорт на всем курорте Сочи и это пожалуй один из самых больших плюсов. Добраться до отеля или гостевого дома не проблема. Дорога от аэропорта до места проживания займет не более 15 минут, все будет зависеть от транспорта.&lt;/p&gt;&lt;p&gt;В самом городе большой выбор отелей, хостелов и других гостевых домиков. Каждый турист найдет то, что ему по душе. Тем более что к олимпиаде город очень изменился и для отдыхающих было сделано все! Курортный городок &ndash; это отдельно построенный комплекс, состоящий из 14 пансионатов, двери которых всегда открыты для туристов.&lt;/p&gt;&lt;p&gt;Если говорить о пляжах, то они делятся на два типа, пляжи курортного городка и пляжи старого Адлера. Отличие между этими пляжами заключаются в том, что в первом очень узкие пляжи, а во втором вода не такая чистая. На пляжах есть все, что необходимо для отличного отдыха, это и кафе и сувенирные магазины, и полноценно оборудованные пляжные зоны.&lt;/p&gt;&lt;p&gt;Так же, если вы хотели посетить Абхазию, до границы из Адлера буквально рукой подать. Заказывайте дневную экскурсию и смотрите на главные достопримечательности Абхазии.&lt;/p&gt;&lt;p&gt;Отдых в Адлере подойдет всем туристам, как с детьми, так и для людей кто приезжает отдохнуть активно.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2. Что посетить в Сочи?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Каждый турист, который первый раз приезжает в другой город, продумывает что ему посетить и на что посмотреть. В наше время найти информацию о том или ином месте не сложно. Мы собрали всю необходимую информацию для вас, о самых красивый местах Большого Сочи.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Центральный Сочи&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;1 &ndash; Сочинский вокзал. Как бы странным это не звучало, но на красоты Центрального сочи, отдыхающий начинает смотреть уже по прибытию в город. Сочинский вокзал - одно из самых красивых зданий в Европе, о чем говорит Красная книга Юнеско (здание попало в книгу в 1975 году). Благодаря своему нетипичному виду, Сочинский вокзал часто был площадкой для съемки советского кино.&lt;/p&gt;&lt;p&gt;2 &ndash; Навагинская улица. Выйдя с вокзала и перейдя дорогу, можно попасть на &ldquo;Сочинский Арбат&rdquo;. К Олимпиаде эту улицу полностью переделали и она стала пешеходной. Конечно большого количества достопримечательностей на ней нет, но прогуляться среди пальм и кипарисов, под приятную музыку на закате стоит.&lt;/p&gt;&lt;p&gt;3 &ndash; Морпорт. Дойдя до конца Навагинской, вы попадаете на Морпорт. История этого сооружения начинается с 1955 года. Именно в этом году и было построено это здание. С четырех сторон здания установлены статуи (времена года), а на верхнем ярусе расположились статуи, самых популярных животных Сочи &ndash; дельфины. Перед Морпортом расположен уютный двор с фонтаном. От Морпорта начинается прогулочная набережная которая, проходит практически по всей длине &ldquo;старого&rdquo; Сочи.&lt;/p&gt;&lt;p&gt;4 &ndash; Старый форт. Для более глубоко погружения в историю города Сочи, вам необходимо с набережной подняться чуть выше и найти знаменитый Эллинский спуск. Поднимаясь по этому спуску вверх, по правой стороне, вы сможете увидеть небольшую дверь. Это и есть вход на территорию старого форта. Он был основан в XIX веке и является нулевым километром города Сочи (установленный в 2017 году).&lt;/p&gt;&lt;p&gt;5 &ndash; Собор Михаила Архангела. Для того чтобы увидеть следующую достопримечательность города Сочи, идти далеко не нужно. Собор Михаила Архангела, находиться через дорогу от Старого форта. Данный собор был построен в честь окончания Кавказской войны по распоряжению Николая I в 1874 году. &amp;nbsp;&lt;/p&gt;&lt;p&gt;6 &ndash; Библиотека имени Пушкина. Одно из первых зданий, которые начали строить после появления крепости. Сама библиотека была построена в 1911 году, на деньги местных жителей. Рядом с библиотекой стоит памятник самому Пушкину и памятник победы в войне с Турцией.&lt;/p&gt;&lt;p&gt;7 &ndash; Зимний театр. Это одно из самых красивых зданий в городе. Построено оно в 1937 году, здание выделяется своим дизайном. Здание украшает 80 колон вокруг и 3 статуи на фронтоне, как раньше так и сейчас это центр культурного отдыха в Сочи. Каждое лето в этом здании проводится кинофестиваль &ldquo;Кинотавр&rdquo;.&lt;/p&gt;&lt;p&gt;После того как вы прошли этот маршрут и посмотрели на красоты архитектуры города Сочи, предлагаем полюбоваться природой. Для этого вам необходимо выйти на Курортный проспект, далее повернуть или на право, или на лево.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Дендрарий &ndash; правее от Зимнего театра&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;В 1889 году этот парк был приобретен издателем Сергеем Худековым и считался частным парком, но сам Сергей позволял местным гулять по парку абсолютно бесплатно. Посмотреть в парке уже в самом начале было на что, так как в парк были привезены растения из Крыма и средиземноморской части Европы. На данный момент в парке насчитывается более 1800 деревьев, кустарников и разных цветов. Так же, ряды Европейских растений пополнили, растения из Японии и Америки. На данный момент посещение парка доступно каждый день, стоимость для взрослого человека 250 рублей, детский билет 120 рублей (актуальную цену лучше уточнить перед посещением). Для полного обхода парка потребуется от трех часов, так что прогулка будет интересной, но и длительной, к этому тоже нужно быть готовым.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Ривьера &ndash; левее от Зимнего театра&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Как и дендрарий, этот парк принадлежал купцу Василию Хлудову и считался частным. Открылся парк в 1898 году, а в 1901 году парк стал собственностью города Сочи. Ривьера не такая разнообразная в плане растений, но и тут можно увидеть редкие растения такие как: бамбук и сакура. Парк очень популярен для отдыха с детьми, так как на территории парка расположены аттракционы и кафе. Так же вы можете посмотреть в парке на ту самую усадьбу Василия Хлудова.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Хостинский район&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Санаторий им. Орджоникидзе&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Если говорить про красоты Хостинского района, то самое первое, что стоить посетить, это лучшую здравницу советского союза санаторий им. Орджоникидзе. Сам санаторий уже не работает, но это место до сих пор призывает людей своей архитектурой. Санаторий был открыт еще в 1937 году для рабочего класса. В здания конечно сейчас уже попасть возможности нет, но есть возможность погулять по территории самого санатория.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Воронцовские пещеры&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Это одно из чудес природы которое стоит посетить каждому туристу. Как минимум из за того, что это чудо природы берет свою историю почти 2 млн. лет назад, именно тогда появился нижний ярус пещер. В этом месте когда то был был большой океан &ldquo;Тетис&rdquo;.&lt;/p&gt;&lt;p&gt;Но стоит помнить, что самостоятельно, вас туда никто не пустит, лучше всего взять индивидуальную экскурсию, вам и расскажут больше и времени посмотреть на все тоже будет больше. Самым главным плюсом является то, что это не самое популярное место среди туристов, но те кто едут, довольны абсолютно все!&lt;/p&gt;&lt;p&gt;На самом деле в Хостинском районе очень большое количество именно пешего туризма, более подробно о каждом маршруте мы опишем уже в следующих статьях, а пока их перечислим, стоит посетить такие места как:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Орлиные скалы&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Тисо-самшитовая роща&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Змейковские водопады&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - Белый скалы в Хосте&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Адлерский район&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Благодаря олимпиаде, в Адлере появилось очень много красивых и современных мест. Главным достояние Адлера является Олимпийский парк. Территория очень большая, на входе вам сразу предложат экскурсию на электрокаре (300 рублей с человека). Вы увидите такие здания как: стадион &ldquo;Фишт&rdquo; &ndash; построенный специально к чемпионату мира по футболу, два ледовых дворца &ndash; построенных к зимней олимпиаде, так же трассу &ldquo;Формулы - 1&rdquo;.&lt;/p&gt;&lt;p&gt;У всех отдыхающих есть возможность не только посмотреть на эти сооружения, но и побывать внутри. Нужно только приобрести билет (футбол/хоккей/гонка Формулы-1) или покататься на коньках в тренировочном центре.&lt;/p&gt;&lt;p&gt;Вечером в Олимпийском парке начинается представление поющих фонтанов. В зависимости от времени года, начало представления меняется: лето &ndash; начало в 20:30, осень/весна &ndash; начало в 19:00, зима &ndash; начало в 18:00. После представления рекомендуем прогулять по самой благоустроенной набережной Адлера &ndash; &ldquo;Имеретинская набережная&rdquo;.&lt;/p&gt;&lt;p&gt;Всего в паре километров от Имеретинской набережной, расположен парк &ldquo;Южные культуры&rdquo;, он меньше Дендрария, но не чуть не уступает в красоте.&lt;/p&gt;&lt;p&gt;А если спокойный отдых вас не интересует, то вы можете рискнуть прогуляться по самой длинной подвесной тропе. Находиться это все в экстремальном парке развлечений &ldquo;Скайпарк&rdquo;, цена взрослого билета составляет 1500 рублей, детский билет 800 рублей. Если и этого вам мало, то за отдельную плату, можно совершить прыжок с тарзанки.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Если подводить итоги, то все очень просто, все будет зависеть от того какой отдых вам нужен. Повторим еще раз кратко:&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Если нужен спокойный семейный отдых, то вам подойдет любой район Большого Сочи, кроме Центрального Сочи.&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Если вам интересен активный отдых, то стоит присматриваться к районам: Центральный Сочи и Адлерский район&lt;/p&gt;&lt;p&gt;-&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Если вы прилетели поправить свое здоровье, то вам больше подойдет Хостинский район&lt;/p&gt;&lt;p&gt;В любом случае, вам понравиться, главное выбирать то, что вам по душе. Хорошего вам отдыха и бурю прекрасных эмоций.&lt;/p&gt;&quot;,
                &quot;user_id&quot;: 9,
                &quot;status&quot;: 1,
                &quot;views&quot;: 0,
                &quot;likes&quot;: 0,
                &quot;favorites&quot;: 0,
                &quot;comments&quot;: 0,
                &quot;country_id&quot;: 1,
                &quot;region_id&quot;: null,
                &quot;city_id&quot;: null,
                &quot;area_id&quot;: null,
                &quot;language_id&quot;: 1,
                &quot;company_id&quot;: null,
                &quot;category_id&quot;: 1,
                &quot;image&quot;: &quot;/attachments/2022/03/31/Где отдыхать и что посмотреть в Сочи.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-03-31 11:31:53&quot;,
                &quot;updated_at&quot;: &quot;2022-03-31 11:32:19&quot;,
                &quot;tags&quot;: &quot;null&quot;,
                &quot;seo_description&quot;: &quot;Для каждого туриста, понятие отдых свое! Кому-то нужно &ldquo;тусить&rdquo;, кому-то нужен семейных отдых на пляже, а для кого то это посещение всевозможных музеев и экскурсий.&quot;,
                &quot;published_at&quot;: &quot;2022-03-31 11:28:53&quot;
            },
            {
                &quot;id&quot;: 24,
                &quot;is_week&quot;: false,
                &quot;is_main&quot;: false,
                &quot;title&quot;: &quot;Москва в плохую погоду&quot;,
                &quot;code&quot;: &quot;moskva-v-plohuyu-pogodu&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;&lt;strong&gt;Где погулять в плохую погоду в Москве?&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;В настоящее время наши планы не всегда получается реализовать и это касается всего, от перенесения отдыха, до плохой погоды. Если большую часть мы в силах изменить или решить, то как же поступить, когда в ваши планы &ldquo;залезла&rdquo; плохая погода?&lt;/p&gt;&lt;p&gt;Все очень просто, нужно только немного поменять планы отдыха. Москва очень большой город и вы точно найдет то, что будет интересно именно вам. Все зависит от того, какой вид отдыха вы предпочитаете. В этой статье мы подобрали несколько вариантов, для каждого типа отдыха.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1 - Музеи и галереи.&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.1 Армянский музей Москвы и культуры нации&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/31/3.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Один из крупнейших музеев, который функционирует и открыт для посетителей за пределами Республики Армении. В самом музее большое количество экспозиций, которые посвящены истории, культуре и традициям армянского народа. На данный момент, в музее есть более десятка интерактивных экспозиций, которые можно посмотреть любым желающим.&lt;/p&gt;&lt;p&gt;Армянский музей расположен недалеко от ботанического сада МГУ, по проспекту Мира, Мещанского района.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Комплекс работает с понедельника по пятницу с 09:00 до 18:00 (суббота и воскресенье выходные). Вход для всех желающих абсолютно бесплатный.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.2 Музей &ldquo;У Троицы&rdquo;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/31/4.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Если вы хотите прочувствовать быт русского человека 19-20 веков, то вам обязательно стоит посетить этот музей.&lt;/p&gt;&lt;p&gt;Это деревянное здание, когда то было домом семьи купцов Неделяевых, сейчас же, это здание принадлежит Подворью Троице-Сергиевой Лавры. В доме остались старые вещи и практически нетронутая атмосфера былых веков.&lt;/p&gt;&lt;p&gt;Во время экскурсии, вам будет рассказано очень много интересных и для кого-то удивительных фактов, а уже после экскурсии можно будет выпить чашечку чая и задать те вопросы, которые у вас появятся.&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Музей находится по адресу: Троицкая 7/1&lt;/p&gt;&lt;p&gt;Цена на экскурсию от 500 рублей (актуальные цены лучше уточнить на кассе).&lt;/p&gt;&lt;p&gt;Очень интересное, а самое главное познавательное место, советуем к посещению.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.3 Музей Садовое кольцо&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/31/5.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Музей Садовое кольцо &ndash; это единственный музей, в котором рассказывается история самого старого района Москвы &ndash; Мещанского.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Сам музей находится в старом особняке, а атмосфера внутри сразу окунает вас в быт и уют людей, которые жили в те времена. Вам будут рассказано о семейных ценностях того времени и конечно о легендах Мещанского района. Экскурсия будет интересна не только взрослым, но и маленьким гостям (в музее есть множество увлекательных экскурсий), так что, пока дети будут познавать историю по своему, вы можете полностью погрузиться в экскурсию.&lt;/p&gt;&lt;p&gt;Всем посетителям будет предложен чай, лекции по истории Москвы, возможность поиграть в исторические квесты и еще многое другое.&lt;/p&gt;&lt;p&gt;Музей находится по адресу: проспект Мира 14 стр. 10&lt;/p&gt;&lt;p&gt;Цена на экскурсию от 300 рублей (актуальные цены лучше уточнить на кассе), есть льготные билеты (по вопросам льгот, обратитесь на официальный сайт).&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.4&lt;/strong&gt; &lt;strong&gt;Российский музей леса&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/31/6.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Большая часть нашей необъятной страны покрыто лесом и является важной составляющей для всего мира. Об этом и рассказывает музей. Вся информация которая собрана в музее за долгое время существования, направлена на правильное отношение к лесу (сохранение/восстановление/использование).&lt;/p&gt;&lt;p&gt;Вам расскажут о животных обитающих в лесах, о полезности леса для окружающей среды и конечно историю лесопользования. Информацию интересна как маленьким гостям, так и взрослым.&lt;/p&gt;&lt;p&gt;Стоимость экскурсии составляет:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;100 рублей - льготный билет&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;200 рублей - полный билет&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;Необходимо уточнить актуальную информацию перед посещением.&lt;/p&gt;&lt;p&gt;Российский музей леса находится по адресу: пер. Монетчиковский 5-й д.4&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1.5&lt;/strong&gt; &lt;strong&gt;Театральный музей имени А.А. Бахрушина&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/31/7.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Пожалуй один из самых старых и крупных музеев театральной тематики в мире. Ранее это здание принадлежало русскому купцу Алексею Александровичу Бахрушину. Само здание построено в 1896 году и сейчас тут находиться вся музейная коллекция театрального искусства. Если говорить более точно, то более миллиона различных экспонатов.&lt;/p&gt;&lt;p&gt;По версии большой Советской энциклопедии, музей имени Бахрушина признан самым крупнейшим театральным музеем в мире!&lt;/p&gt;&lt;p&gt;Посещение музея платное, цена составляет:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 150 рублей &ndash; льготный билет&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 300 рублей &ndash; полный билет&lt;/p&gt;&lt;p&gt;Необходимо уточнять актуальную информацию о цене перед посещением музея.&lt;/p&gt;&lt;p&gt;Театральный музей имени А.А. Бахрушина находится по адресу: ул. Бахрушина 31/12&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2 - Прогулки и театры&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.1 Московский зоопарк&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/31/10.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Московский зоопарк является первым зоопарков в России и был открыт в 1864 году. Создателями зоопарка считаются Императорское Русское общество, на чьи средства и содержали зоопарк. Основной работой зоопарка считается &ndash; сохранение видов, как исследовательской, так и просветительской деятельности.&lt;/p&gt;&lt;p&gt;В настоящий момент в зоопарке насчитывается более 8 тысяч особей разного вида фауны. Сам зоопарк разделен на секции (в зависимости от животных и естественной среды обитания). Московский зоопарк является членом Всемирной и Европейской ассоциации зоопарков и аквариумов.&lt;/p&gt;&lt;p&gt;Вы можете как самостоятельно прийти и посмотреть на всех животных, так и записаться на специальную экскурсию, а так же есть возможность записать на лекции и семинары.&lt;/p&gt;&lt;p&gt;Московский зоопарк находится по адресу: ул. Большая Грузинская 1. Стоимость билетов:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - 800 рублей &ndash; взрослый билет&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; - бесплатно &ndash; студенты очной формы, многодетные семьи (от 3-ех и более детей), дети до 17 лет, инвалиды.&lt;/p&gt;&lt;p&gt;Более подробную информацию о стоимости узнавайте на сайте или кассах зоопарка.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2.2 Большой театр&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/31/11.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Принято считать, что история Большого театра начинается в марте 1776 года, но тогда собственного здания не было и представления проходили в доме Воронцова на Знаменке. На средства Михаила Медокса был построен первый Большой театр в 1780 году и получил название &ldquo;Петровский&rdquo; из-за улицы на которой он находился.&lt;/p&gt;&lt;p&gt;В 1805 году здание сгорело и представления стали проходить опять в других местах. Такая ситуация продолжалась вплоть до 1825 года, новое здание Большого театра было открыто 18 января 1825 года. Но история повторилась, в марте 1853 года, в здании начался пожар, многое в здании пострадало (костюмы, инструменты, ноты и само здание).&lt;/p&gt;&lt;p&gt;Если брать наше время, то последние восстановительные работы проходили с 2005 по 2011 год. Исторический облик театра остался нетронутым, все что вы видите отправляет вас в незабываемый мир искусства и прошлого времени. Большой театр считается главной культурной доминантой столицы.&lt;/p&gt;&lt;p&gt;Информацию по цена лучше уточнять на кассах или сайте театра.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;strong&gt;2.3&lt;/strong&gt; &lt;strong&gt;Сад Эрмитаж&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/31/12.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Сад Эрмитаж &ndash; это памятник садово-паркового искусства, который находится в Москве в районе улицы Каретный ряд. Открытие сада произошло по инициативе известного московского театрального предпринимателя Якова Щукина в 1894 году.&lt;/p&gt;&lt;p&gt;Именно в этом месте произошёл первый кинопоказ братьев Люмьер.&lt;/p&gt;&lt;p&gt;На территории сада, расположены такие театры как: &ldquo;Новая Опера&rdquo;, &ldquo;Эрмитаж&rdquo; и &ldquo;Сфера&rdquo;. Так же на территории сада есть открытие беседки, большие фонтаны и гуляя по саду можно многое узнать о архитектуре и строениях, которые расположены на территории.&lt;/p&gt;&lt;p&gt;Да по самому саду прогуляться в плохую погоду не получиться, а вот посетить театры возможность есть.&lt;/p&gt;&lt;p&gt;Сад Эрмитаж находится по адресу ул.Каретный ряд вл.3&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;strong&gt;2.4&lt;/strong&gt; &lt;strong&gt;Монументальные часы Ракета&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;img src=\&quot;https://u-gid.com//attachments/2022/03/31/13.jpg\&quot;&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Это самые большие механические часы &ldquo;Ракета&rdquo;. Какого только металла в них нет и сталь, и титан, и алюминий и даже золото. Вес часов 4,5 тонны, а диаметр составляет 3 метра, длина же маятника почти 13 метров. Такую конструкцию, построили и установили всего за 6 месяцев.&lt;/p&gt;&lt;p&gt;Расположены часы на Лубянской площади в главном атриуме Центрального детского магазина на Лубянке. Построены часы были в 2014 году, а открыты были в январе 2015 года мэром Москвы Сергеем Собяниным.&lt;/p&gt;&lt;p&gt;Стоит посмотреть и оценить масштабы этого творения, тем более плохая погода вам тут не помешает.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Если говорить обобщенно, то в Москве очень много мест куда можно сходить в плохую погоду. Главное четко понимать, что именно вам интересно и подобрать для вас оптимальный вид отдыха. Если вам интересны другие достопримечательности Москвы или других городов, то вы можете детально узнать всю информацию (экскурсии/достопримечательности/бары и рестораны) у нас на сайте - u-gid.com. Переходите на сайт, выбирайте интересующий вас город и планируйте свое путешествие заранее!&lt;/p&gt;&lt;p&gt;Хорошего вам отдыха и ярких впечатлений!&lt;/p&gt;&quot;,
                &quot;user_id&quot;: 9,
                &quot;status&quot;: 1,
                &quot;views&quot;: 0,
                &quot;likes&quot;: 0,
                &quot;favorites&quot;: 0,
                &quot;comments&quot;: 0,
                &quot;country_id&quot;: 1,
                &quot;region_id&quot;: null,
                &quot;city_id&quot;: null,
                &quot;area_id&quot;: null,
                &quot;language_id&quot;: 1,
                &quot;company_id&quot;: null,
                &quot;category_id&quot;: 1,
                &quot;image&quot;: &quot;/attachments/2022/03/31/1.jpg&quot;,
                &quot;created_at&quot;: &quot;2022-03-31 07:16:20&quot;,
                &quot;updated_at&quot;: &quot;2022-03-31 07:17:27&quot;,
                &quot;tags&quot;: &quot;&quot;,
                &quot;seo_description&quot;: &quot;Где погулять в Москве в плохую погоду? Мы собрали самые популярные места и готовы поделиться с вами полезной информацией&quot;,
                &quot;published_at&quot;: &quot;2022-03-31 07:17:04&quot;
            }
        ],
        &quot;first_page_url&quot;: &quot;https://u-gid.com/api/blog?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;last_page_url&quot;: &quot;https://u-gid.com/api/blog?page=1&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://u-gid.com/api/blog?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: null,
        &quot;path&quot;: &quot;https://u-gid.com/api/blog&quot;,
        &quot;per_page&quot;: 15,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 10,
        &quot;total&quot;: 10
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-blog" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-blog"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-blog"></code></pre>
</span>
<span id="execution-error-GETapi-blog" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-blog"></code></pre>
</span>
<form id="form-GETapi-blog" data-method="GET"
      data-path="api/blog"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"0x11c22a22123eb42862c215fcb53eac33ebe2xc"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-blog', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/blog</code></b>
        </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
