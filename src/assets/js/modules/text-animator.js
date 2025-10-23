// Text animator - reusable for primary and secondary titles
export function initTextAnimator() {
    // Check if GSAP is loaded
    if (typeof gsap === 'undefined') {
        console.error('GSAP not loaded');
        return;
    }

    // Get primary title element
    const primaryTitle = document.querySelector('.primary-title');
    if (!primaryTitle) {
        console.warn('No .primary-title found');
        return;
    }

    // GSAP Timeline for the animation
    const tl = gsap.timeline();

    // Get all child nodes (text nodes and span elements)
    const childNodes = Array.from(primaryTitle.childNodes);

    // Separate symbols (spans with .highlight) and text nodes
    const symbols = primaryTitle.querySelectorAll('span.highlight');
    const textNodes = childNodes.filter(node =>
        node.nodeType === Node.TEXT_NODE && node.textContent.trim() !== ''
    );

    // Wrap each word in the text nodes with a span for animation
    const wordSpans = [];
    textNodes.forEach(textNode => {
        const text = textNode.textContent.trim();
        if (!text) return; // Skip empty text nodes

        const words = text.split(/\s+/);
        const fragment = document.createDocumentFragment();

        words.forEach((word, index) => {
            if (word) {
                const wordSpan = document.createElement('span');
                wordSpan.textContent = word;
                wordSpan.style.display = 'inline-block';
                wordSpan.style.marginRight = '0.25em'; // Add space between words
                wordSpan.classList.add('word-animate');

                // Mark specific words for widen animation
                const wordLower = word.toLowerCase();
                if (wordLower === 'curious' || wordLower === 'abilities') {
                    wordSpan.classList.add('word-widen');
                }

                fragment.appendChild(wordSpan);
                wordSpans.push(wordSpan);
            }
        });

        // Replace text node with wrapped words
        if (fragment.childNodes.length > 0) {
            textNode.parentNode.replaceChild(fragment, textNode);
        }
    });

    console.log('Found', wordSpans.length, 'words to animate:', wordSpans.map(s => s.textContent));

    // Step 0: Hide everything initially
    gsap.set(wordSpans, {
        opacity: 0,
        y: 30 // Move from 30px below
    });

    gsap.set(symbols, {
        opacity: 0,
        y: 30, // Symbols also move from 30px below
        display: 'inline-block',
        marginRight: '0.25em' // Add space after symbols too
    });

    // Set initial font-variation-settings for widen words
    wordSpans.forEach(wordSpan => {
        if (wordSpan.classList.contains('word-widen')) {
            // Start with normal width (wdth: 100)
            gsap.set(wordSpan, {
                fontVariationSettings: '"wdth" 100, "wght" 700'
            });
        }
    });

    // Step 1: Words and symbols pop up from bottom
    // Collect all elements in DOM order
    const allElementsInOrder = [];

    // Re-traverse the DOM to get correct order after word wrapping
    primaryTitle.childNodes.forEach(node => {
        if (node.nodeType === Node.ELEMENT_NODE) {
            if (node.classList.contains('highlight')) {
                allElementsInOrder.push({ element: node, type: 'symbol' });
            } else if (node.classList.contains('word-animate')) {
                allElementsInOrder.push({
                    element: node,
                    type: 'word',
                    widen: node.classList.contains('word-widen')
                });
            }
        }
    });

    console.log('Animation order:', allElementsInOrder.map(el => `${el.type}: ${el.element.textContent}`));

    // Get all elements in order
    const allElementsList = allElementsInOrder.map(item => item.element);
    const widenWords = allElementsInOrder.filter(item => item.widen).map(item => item.element);

    // Animate all elements (pop up from bottom) using stagger
    tl.to(allElementsList, {
        opacity: 1,
        y: 0,
        duration: 0.5,
        ease: 'power2.out',
        stagger: 0.4 // 0.4s delay between each element - smoother than manual timing
    });

    // Animate font width for widen words (happens during pop-up)
    // Use stagger for widening, and sync return to normal
    if (widenWords.length > 0) {
        // Widen animation with stagger (each word widens when it appears)
        widenWords.forEach((widenWord) => {
            const elementIndex = allElementsList.indexOf(widenWord);
            const startTime = elementIndex * 0.4;

            tl.to(widenWord, {
                fontVariationSettings: '"wdth" 250, "wght" 700', // Extended width
                duration: 0.6,
                ease: 'power1.inOut'
            }, startTime); // Same start time as pop-up
        });

        // Return to normal - ALL at the same time (no stagger)
        const lastWidenWordIndex = allElementsList.indexOf(widenWords[widenWords.length - 1]);
        const lastWidenTime = lastWidenWordIndex * 0.4 + 0.6; // After last widen completes

        tl.to(widenWords, {
            fontVariationSettings: '"wdth" 100, "wght" 700', // Back to normal
            duration: 0.6,
            ease: 'power1.inOut'
        }, lastWidenTime); // All return together
    }

    // Calculate when to start secondary title - closer to the end, not after everything
    const lastElementStartTime = (allElementsList.length - 1) * 0.4;
    const secondaryTitleStart = lastElementStartTime + 0.3; // Start just 0.3s after last element starts appearing

    // Step 2: Animate the secondary title (slide from right with opacity)
    const secondaryTitle = document.querySelector('.secondary-title');
    if (secondaryTitle) {
        gsap.set(secondaryTitle, {
            opacity: 0,
            x: 100 // Start 100px to the right
        });

        tl.to(secondaryTitle, {
            opacity: 1,
            x: 0,
            duration: 0.8,
            ease: 'power2.out'
        }, secondaryTitleStart); // Start much earlier, closer to primary title end
    }

    console.log('Text animator initialized');
}
