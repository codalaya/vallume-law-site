<template>
    <div>
        <div class="modal-backdrop fade show" v-if="show"></div>
        <div v-if="show" class="video-popup-overlay" @click.self="close">
            <div class="video-container">
                <button class="close-btn" @click="close">&times;</button>
                <iframe :src="embedUrl" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, watch, ref } from 'vue'

const props = defineProps({
    url: {
        type: String,
        required: true,
    },
    show: {
        type: Boolean,
        default: false,
    },
})

const emit = defineEmits(['close'])

const embedUrl = computed(() => {
    const videoId = extractVideoId(props.url)
    let startTime = 0

    // Parse start time from URL (supports ?t=, &t=, ?start=, &start=, #t=, #start=)
    const timeRegex = /[?&#](?:t|start)=([0-9hms]+)/i
    const match = props.url.match(timeRegex)
    if (match && match[1]) {
        // Convert time string (e.g. 1m30s, 90, 2h3m) to seconds
        const timeStr = match[1]
        if (/^\d+$/.test(timeStr)) {
            startTime = parseInt(timeStr)
        } else {
            // Parse formats like 1h2m3s
            const h = /(\d+)h/.exec(timeStr)
            const m = /(\d+)m/.exec(timeStr)
            const s = /(\d+)s/.exec(timeStr)
            startTime =
                (h ? parseInt(h[1]) * 3600 : 0) +
                (m ? parseInt(m[1]) * 60 : 0) +
                (s ? parseInt(s[1]) : 0)
        }
    }

    return videoId
        ? `https://www.youtube.com/embed/${videoId}?autoplay=1${startTime ? `&start=${startTime}` : ''}`
        : ''
})

function extractVideoId(url) {
    const regex = /(?:v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/
    const match = url.match(regex)
    return match ? match[1] : null
}

function close() {
    emit('close')
}
</script>

<style scoped lang="scss">
$colorone: var(--primary-color);
$colortwo: var(--secondary-color);

.video-popup-overlay {
    position: fixed;
    inset: 0;
    background: rgba($colorone, 0.95);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1051;

    .video-container {
        position: relative;
        width: 90%;
        max-width: 800px;
        aspect-ratio: 16 / 9;
        background: #000;

        iframe {
            width: 100%;
            height: 100%;
        }

        .close-btn {
            position: absolute;
            top: -20px;
            right: -20px;
            background: $colortwo;
            color: $colorone;
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }
}
</style>
