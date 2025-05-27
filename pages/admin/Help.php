<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kos Pelita Harapan</title>
    <!-- Flowbite and Tailwind CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
    </style>
</head>

<body>
    <div class="flex h-screen bg-gray-50">
        <?php include "./Components/admin/sidebar.php"; ?>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto ml-[16rem]">
            <!-- Main Content -->
            <div class=" p-10 w-full " data-aos="fade-right">
                <div class="flex-1 bg-white p-6 rounded-lg shadow-lg ">
                    <h2 class="text-xl font-semibold mb-4">Chat Pengguna</h2>
                    <div id="chat-box" class="flex flex-col p-4 h-[400px] overflow-y-auto border rounded-lg bg-gray-50 mb-4"></div>
                    <div class="flex">
                        <input id="message" type="text" placeholder="Message" class="flex-1 border rounded-l px-4 py-2 focus:outline-none" />
                        <button onclick="sendMessage()" class="bg-[#322A7D] text-white px-4 py-2 rounded-r">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User profile dropdown button -->
    <button id="userDropdown" class="fixed bottom-6 left-6 z-50 flex items-center bg-white text-gray-700 p-2 rounded-lg shadow-md">
        <div class="flex items-center">
            <img class="w-8 h-8 rounded-full" src="/api/placeholder/32/32" alt="Aca">
            <div class="ml-3">
                <p class="text-sm font-medium">Aca</p>
                <p class="text-xs text-gray-500">Admin</p>
            </div>
        </div>
        <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
        </svg>
    </button>
</body>

</html>
<script>
    function fetchMessages() {
        fetch("pages/controller/get_messages.php")
            .then(response => response.json())
            .then(data => {
                const chatBox = document.getElementById("chat-box");
                chatBox.innerHTML = '';
                data.forEach(msg => {
                    const bubble = document.createElement("div");
                    bubble.className = `my-1 p-3 rounded-lg max-w-[70%] ${
                        msg.sender === 'admin' ? 'bg-gray-200 self-start' : 'bg-[#322A7D] text-white self-end ml-auto'
                    }`;
                    bubble.innerText = msg.message;
                    chatBox.appendChild(bubble);
                });
                chatBox.scrollTop = chatBox.scrollHeight;
            });
    }

    function sendMessage() {
        const msg = document.getElementById("message").value;
        if (!msg) return;

        fetch("pages/controller/send_message.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `sender=user&message=${encodeURIComponent(msg)}`
        }).then(() => {
            document.getElementById("message").value = '';
            fetchMessages();
        });
    }

    setInterval(fetchMessages, 2000);
    fetchMessages();
</script>
<script></script>