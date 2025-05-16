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
                        <p class="mt-2">Parameters:</p>
                        <ul class="list-disc ml-6">
                            <li>name (required)</li>
                            <li>email (required, unique)</li>
                            <li>password (required, min:8)</li>
                            <li>password_confirmation (required)</li>
                        </ul>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Login</h3>
                        <code class="block bg-gray-100 p-2 rounded">POST /api/login</code>
                        <p class="mt-2">Parameters:</p>
                        <ul class="list-disc ml-6">
                            <li>email (required)</li>
                            <li>password (required)</li>
                        </ul>
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
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Get Single Blog Post</h3>
                        <code class="block bg-gray-100 p-2 rounded">GET /api/blog-posts/{id}</code>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Create Blog Post</h3>
                        <code class="block bg-gray-100 p-2 rounded">POST /api/blog-posts</code>
                        <p class="mt-2">Parameters:</p>
                        <ul class="list-disc ml-6">
                            <li>title (required)</li>
                            <li>content (required)</li>
                        </ul>
                        <p class="mt-2 text-gray-600">* Requires authentication</p>
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
                        <p class="mt-2 text-gray-600">* Requires authentication</p>
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
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-medium mb-2">Create Comment</h3>
                        <code class="block bg-gray-100 p-2 rounded">POST /api/blog-posts/{id}/comments</code>
                        <p class="mt-2">Parameters:</p>
                        <ul class="list-disc ml-6">
                            <li>content (required)</li>
                        </ul>
                        <p class="mt-2 text-gray-600">* Requires authentication</p>
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
