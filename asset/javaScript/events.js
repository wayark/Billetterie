shrinkDescritions = () => {
    document.querySelectorAll('.event-desc').forEach((description) => {
        description.innerHTML = description.innerHTML.slice(0, 150) + '...';
    });
};
shrinkDescritions();