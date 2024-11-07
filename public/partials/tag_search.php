<input id="search-input" type="text" placeholder="Search tags...">

<div id="tag-list"></div>

<script>
const tags = [
  "network", "net", "vane", "entanglement", "world wide web", "www", "spider", "trophic",
  "retina", "thicket", "red", "tissue", "webb", "toile", "cloth", "weft", "twill", "weave",
  "canvas", "tangle", "chain", "painting", "electronic", "tented", "sling", "portal", 
  "fabric", "online", "réseau", "mong", "site", "home", "siege", "soul", "interconnection",
  "page", "line", "virtual", "on-line", "address", "update", "enabled", "webcast", 
  "homepage", "available", "system", "webpage", "cyber", "cyberspace", "networking", 
  "intranet", "internet", "website", "grid", "galle", "jal", "loeb", "chains", "nets", 
  "networks", "posted", "sites", "web-based", "websites", "webmaster", "browser", 
  "search engine", "http", "web browser", "content", "html", "blog", "google", "hyperlink", 
  "webform", "seo", "myspace", "directory", "wap", "software", "webpages", "webmasters", 
  "drupal", "telary", "widget", "download", "retiary", "lewis carroll", "wiki", "stie", 
  "portal site", "keyword", "facebook", "sba", "click", "info", "toolbar", "urls", "dfw", 
  "referer"
];

const CHUNK_SIZE = 1000;

// Function to filter and display tags
function filterTags() {
    const input = document.getElementById('search-input').value.toLowerCase();
    const tagList = document.getElementById('tag-list');
    tagList.innerHTML = ''; // Clear previous results

    // Break the tags into chunks to avoid blocking
    const searchInChunks = (tags, chunkSize, index = 0) => {
        if (index >= tags.length) return;

        const chunk = tags.slice(index, index + chunkSize);

        chunk.forEach(tag => {
            const tagText = tag.toLowerCase();
            const inputLength = input.length;
            const matchPercentage = inputLength / tagText.length;

            // Display the tag if it matches more than 30% of the input
            if (matchPercentage >= 0.3 && tagText.includes(input)) {
                const li = document.createElement('li');
                li.textContent = tag;
                tagList.appendChild(li);
            }
        });

        // Search the next chunk after a slight delay to prevent UI blocking
        setTimeout(() => searchInChunks(tags, chunkSize, index + chunkSize), 50);
    };

    if (input) {
        searchInChunks(tags, CHUNK_SIZE);
    }
}

// Attach filterTags function to input event
document.getElementById('search-input').addEventListener('input', filterTags);
</script>
