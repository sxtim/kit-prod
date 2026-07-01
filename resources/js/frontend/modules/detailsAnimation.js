const animationOptions = {
	duration: 260,
	easing: "ease-in-out",
}

const prepareContent = content => {
	let inner = content.querySelector(":scope > .details__content-inner")

	if (inner) {
		return inner
	}

	inner = document.createElement("div")
	inner.className = "details__content-inner"

	while (content.firstChild) {
		inner.appendChild(content.firstChild)
	}

	content.appendChild(inner)

	return inner
}

const initDetailsAnimation = () => {
	document.querySelectorAll("details.details").forEach(details => {
		if (details.dataset.detailsAnimated === "true") {
			return
		}

		const summary = details.querySelector("summary")
		const content = details.querySelector(".details__content")

		if (!summary || !content) {
			return
		}

		prepareContent(content)

		if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
			details.dataset.detailsAnimated = "true"
			return
		}

		let animation = null
		let animationFallback = null
		let isClosing = false
		let isExpanding = false

		const clearContentStyles = () => {
			if (animationFallback) {
				window.clearTimeout(animationFallback)
				animationFallback = null
			}

			content.style.height = ""
			content.style.overflow = ""
			content.style.transition = ""
			content.style.willChange = ""
		}

		const finishAnimation = isOpen => {
			details.open = isOpen
			animation = null
			isClosing = false
			isExpanding = false
			clearContentStyles()
		}

		const cancelAnimation = () => {
			if (!animation) {
				return
			}

			content.removeEventListener("transitionend", animation)
			animation = null

			if (animationFallback) {
				window.clearTimeout(animationFallback)
				animationFallback = null
			}
		}

		const close = () => {
			isClosing = true

			cancelAnimation()
			content.style.overflow = "hidden"
			content.style.willChange = "height"
			content.style.height = `${content.offsetHeight}px`
			content.style.transition = `height ${animationOptions.duration}ms ${animationOptions.easing}`

			animation = event => {
				if (event.target === content && event.propertyName === "height") {
					content.removeEventListener("transitionend", animation)
					finishAnimation(false)
				}
			}

			content.addEventListener("transitionend", animation)
			animationFallback = window.setTimeout(() => finishAnimation(false), animationOptions.duration + 80)
			content.offsetHeight
			content.style.height = "0px"
		}

		const expand = () => {
			isExpanding = true

			cancelAnimation()
			content.style.overflow = "hidden"
			content.style.willChange = "height"
			content.style.height = "0px"
			content.style.transition = `height ${animationOptions.duration}ms ${animationOptions.easing}`

			animation = event => {
				if (event.target === content && event.propertyName === "height") {
					content.removeEventListener("transitionend", animation)
					finishAnimation(true)
				}
			}

			content.addEventListener("transitionend", animation)
			animationFallback = window.setTimeout(() => finishAnimation(true), animationOptions.duration + 80)
			content.offsetHeight
			content.style.height = `${content.scrollHeight}px`
		}

		const open = () => {
			cancelAnimation()
			isClosing = false
			details.open = true
			content.style.height = "0px"
			content.style.overflow = "hidden"
			content.style.transition = "none"
			content.style.willChange = "height"

			window.requestAnimationFrame(expand)
		}

		summary.addEventListener("click", event => {
			event.preventDefault()

			if (isClosing || !details.open) {
				open()
				return
			}

			if (isExpanding || details.open) {
				close()
			}
		})

		details.dataset.detailsAnimated = "true"
	})
}

export default initDetailsAnimation
