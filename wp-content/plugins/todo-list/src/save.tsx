import { useBlockProps } from "@wordpress/block-editor";

export default function save({ attributes }) {
	// console.log(attributes);
	return (
		<div {...useBlockProps.save()}>
			{/* {attributes.content.map((content, index) => (
				<div key={index}>{content}</div>
			))} */}
		</div>
	);
}
