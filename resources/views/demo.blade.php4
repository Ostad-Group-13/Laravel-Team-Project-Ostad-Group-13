document.querySelectorAll('.favorite-btn').forEach(button => {
button.addEventListener('click', function () {
const recipeId = this.dataset.recipeId;
const isFavorited = this.dataset.favorited === 'true';

const url = `/recipe/${recipeId}/favorite`;
const method = isFavorited ? 'delete' : 'post';

axios({
method: method,
url: url,
headers: {
'X-CSRF-TOKEN': '{{ csrf_token() }}'
}
}).then(response => {
this.dataset.favorited = !isFavorited;
this.textContent = !isFavorited ? 'Unfavorite' : 'Favorite';
}).catch(error => {
console.error(error);
});
});
});