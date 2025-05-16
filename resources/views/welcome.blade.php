<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Blog API Documentation</title>
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold mb-8">Laravel Blog API Documentation</h1>

            <!-- Authentication -->
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Authentication Endpoints</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Register</h3>
                        <code class="block bg-gray-100 p-2 rounded">POST /api/register</code>
                        <p class="mt-2">Request Body:</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}</code></pre>
                        <p class="mt-2">Success Response (201):</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "message": "User registered successfully",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
    }
}</code></pre>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Login</h3>
                        <code class="block bg-gray-100 p-2 rounded">POST /api/login</code>
                        <p class="mt-2">Request Body:</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "email": "john@example.com",
    "password": "password123"
}</code></pre>
                        <p class="mt-2">Success Response (200):</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "message": "Login successful",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    },
    "token": "1|abcdef123456..."
}</code></pre>
                    </div>
                </div>
            </section>

            <!-- Blog Posts -->
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Blog Posts Endpoints</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">List Blog Posts</h3>
                        <code class="block bg-gray-100 p-2 rounded">GET /api/blog-posts</code>
                        <p class="mt-2">Success Response (200):</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>[
    {
        "id": 1,
        "title": "First Blog Post",
        "content": "Content of the blog post...",
        "user": {
            "id": 1,
            "name": "John Doe"
        },
        "likes": [
            {
                "id": 1,
                "user_id": 2
            }
        ],
        "comments": [
            {
                "id": 1,
                "content": "Great post!",
                "user": {
                    "id": 2,
                    "name": "Jane Doe"
                }
            }
        ],
        "created_at": "2024-01-01T00:00:00.000000Z"
    }
]</code></pre>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Create Blog Post</h3>
                        <code class="block bg-gray-100 p-2 rounded">POST /api/blog-posts</code>
                        <p class="mt-2">Request Body:</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "title": "My New Blog Post",
    "content": "This is the content of my blog post..."
}</code></pre>
                        <p class="mt-2">Success Response (201):</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "id": 2,
    "title": "My New Blog Post",
    "content": "This is the content of my blog post...",
    "user_id": 1,
    "created_at": "2024-01-01T00:00:00.000000Z",
    "updated_at": "2024-01-01T00:00:00.000000Z"
}</code></pre>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Update Blog Post</h3>
                        <code class="block bg-gray-100 p-2 rounded">PUT /api/blog-posts/{id}</code>
                        <p class="mt-2">Parameters:</p>
                        <ul class="list-disc ml-6">
                            <li>title (optional)</li>
                            <li>content (optional)</li>
                        </ul>
                        <p class="mt-2 text-gray-600">* Requires authentication</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Delete Blog Post</h3>
                        <code class="block bg-gray-100 p-2 rounded">DELETE /api/blog-posts/{id}</code>
                        <p class="mt-2 text-gray-600">* Requires authentication</p>
                    </div>
                </div>
            </section>

            <!-- Likes -->
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Likes Endpoints</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Toggle Like</h3>
                        <code class="block bg-gray-100 p-2 rounded">POST /api/blog-posts/{id}/like</code>
                        <p class="mt-2">Success Response (Like created - 201):</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "message": "Post liked"
}</code></pre>
                        <p class="mt-2">Success Response (Like removed - 200):</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "message": "Post unliked"
}</code></pre>
                    </div>
                </div>
            </section>

            <!-- Comments -->
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Comments Endpoints</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">List Comments</h3>
                        <code class="block bg-gray-100 p-2 rounded">GET /api/blog-posts/{id}/comments</code>
                        <p class="mt-2">Success Response (200):</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>[
    {
        "id": 1,
        "content": "This is a great post!",
        "user": {
            "id": 2,
            "name": "Jane Doe"
        },
        "created_at": "2024-01-01T00:00:00.000000Z"
    }
]</code></pre>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Create Comment</h3>
                        <code class="block bg-gray-100 p-2 rounded">POST /api/blog-posts/{id}/comments</code>
                        <p class="mt-2">Request Body:</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "content": "This is a great post!"
}</code></pre>
                        <p class="mt-2">Success Response (201):</p>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "id": 1,
    "blog_post_id": 1,
    "user_id": 2,
    "content": "This is a great post!",
    "created_at": "2024-01-01T00:00:00.000000Z",
    "updated_at": "2024-01-01T00:00:00.000000Z"
}</code></pre>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Update Comment</h3>
                        <code class="block bg-gray-100 p-2 rounded">PUT /api/comments/{id}</code>
                        <p class="mt-2">Parameters:</p>
                        <ul class="list-disc ml-6">
                            <li>content (required)</li>
                        </ul>
                        <p class="mt-2 text-gray-600">* Requires authentication</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Delete Comment</h3>
                        <code class="block bg-gray-100 p-2 rounded">DELETE /api/comments/{id}</code>
                        <p class="mt-2 text-gray-600">* Requires authentication</p>
                    </div>
                </div>
            </section>

            <!-- Error Responses -->
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Common Error Responses</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Unauthorized (401)</h3>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "message": "Unauthenticated"
}</code></pre>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Validation Error (422)</h3>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "message": "The given data was invalid.",
    "errors": {
        "field": [
            "Error message"
        ]
    }
}</code></pre>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Not Found (404)</h3>
                        <pre class="bg-gray-100 p-2 rounded mt-2"><code>{
    "message": "Resource not found"
}</code></pre>
                    </div>
                </div>
            </section>

            <!-- Authentication Note -->
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Authentication Note</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="mb-4">For authenticated endpoints, include the token in your request headers:</p>
                    <code class="block bg-gray-100 p-2 rounded">Authorization: Bearer {your_token}</code>
                </div>
            </section>
        </div>
    </body>
</html>
