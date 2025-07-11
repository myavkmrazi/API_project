document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete-post');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const postId = this.getAttribute('data-id');
            const row = this.closest('tr');

            if (confirm('Вы уверены, что хотите удалить этот пост?')) {
                fetch(`/admin/posts/${postId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        row.remove();
                        alert('Пост успешно удален.');
                    } else {
                        alert('Ошибка при удалении поста.');
                    }
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                });
            }
        });
    });
});
