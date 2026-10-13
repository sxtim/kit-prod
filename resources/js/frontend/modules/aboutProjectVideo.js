function withAutoplay(source) {
	try {
		const url = new URL(source, window.location.origin)
		url.searchParams.set("autoplay", "1")

		return url.toString()
	} catch {
		return source
	}
}

function createIframe(source, title) {
	const iframe = document.createElement("iframe")

	iframe.src = withAutoplay(source)
	iframe.title = title
	iframe.allow = "autoplay; encrypted-media; fullscreen; picture-in-picture;"
	iframe.allowFullscreen = true
	iframe.setAttribute("frameborder", "0")

	return iframe
}

function initAboutProjectVideo() {
	document.querySelectorAll("[data-about-project-video]").forEach(preview => {
		preview.addEventListener("click", event => {
			const source = preview.dataset.videoSrc
			const media = preview.closest(".about-project__media")

			if (!source || !media) return

			event.preventDefault()

			const iframe = createIframe(
				source,
				preview.getAttribute("aria-label") || "Видео о проекте"
			)

			media.replaceChildren(iframe)
		})
	})
}

export default initAboutProjectVideo
