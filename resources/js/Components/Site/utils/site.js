export const initialsFor = (name = '') => name
    .split(' ')
    .filter(Boolean)
    .slice(0, 2)
    .map((part) => part.charAt(0).toUpperCase())
    .join('');

export const splitParagraphs = (text = '') => text
    .split(/\r?\n\s*\r?\n/)
    .map((paragraph) => paragraph.trim())
    .filter(Boolean);

export const isSectionEnabled = (section) => {
    const value = section?.is_enabled;

    if (value === undefined || value === null) {
        return true;
    }

    return ![false, 0, '0', 'false'].includes(value);
};
